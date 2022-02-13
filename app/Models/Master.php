<?php

namespace App\Models;

use DB;
use Log;
use Auth;
use Litipk\BigNumbers\Decimal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $table = 'th_master';
    use HasFactory;

    public static function generateUserID() {
	    try {
            $affiliate = DB::transaction(function () {
                // Get Prime Value
                $record = self::where('item', 'PRNG_PRIME_VALUE')
                    ->select('value')
                    ->lockForUpdate()
                    ->first();
                $data = [0, 0, 0];
                if (isset($record) && isset($record->value)) {
                    $data = json_decode($record->value);
                }

                $record = self::where('item', 'USERID_PREFIX')
                    ->select('value')
                    ->first();
                $prefix = '';
                if (isset($record) && isset($record->value)) {
                    $prefix = $record->value;
                }

                while (true) {
                    $prime = PRNGPrimeKeys[intval($data[1])];
                    $key = self::makePRNG($data[0], $prime, $data[2]);
                    $userid = $prefix . $key;

                    $data[0]++;
                    $check = User::checkUserId($userid);
                    if ($check == true) break;
                }
                $ret = self::where('item', 'PRNG_PRIME_VALUE')
                    ->update([
                        'value' => json_encode($data),
                    ]);
                return $userid;
            });

            return $affiliate;
        }
        catch (\Exception $ex) {
	        Log::channel('appsolution')->info($ex->getMessage());
	        return 0;
        }
	}

	public static function makePRNG($sequence, $primeKey, $offset) {
	    $key = '';

	    $num = Decimal::create($sequence);
	    $prime = Decimal::create($primeKey);

	    $rem = Decimal::create($num);
	    $rem = $rem->mul($rem)->mod($prime);
	    if ($rem->isGreaterThan($prime->div(Decimal::create(2)))) {
	        $rem = $prime->sub($rem);
        }

	    $rem = $rem->add(Decimal::create($offset))->mod($prime);
	    $key .= str_pad($rem->__toString(), 6, '0', STR_PAD_LEFT);

	    return $key;
    }

    public static function getValue($option) {
        $record = self::where('item', $option)
            ->select('value')
            ->first();

        if (!isset($record) || !isset($record->value)) {
            return 0;
        }

        return $record->value;
    }
}
