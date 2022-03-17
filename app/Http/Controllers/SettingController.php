<?php

namespace App\Http\Controllers;

use Auth;
use Log;
use App\Models\Country;
use App\Models\Referral;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SettingController extends Controller
{
    protected $marker = '/public/images/logo/QR.png';

    public function index() {
        $user = Auth::user();

        $countries = Country::all()->toArray();
        $data['country_list'] = $countries;
        $data['register_url'] = env('APP_URL') . '/register?aid=' . $user->affiliate_id;
        $data['referral'] = $user->hasMany(Referral::class, 'prev_parent_id')->count();

        return view('setting', $data);
    }

    public function updateProfile(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'avatar' => ['nullable', 'mimes:jpg,bmp,jpeg,png'],
            'name' => ['required', 'string', 'max:128'],
            'birthday' => ['required', 'date', 'regex:/^[+-]?\d{4}\/(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])$/'],
            'mobile' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:64'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:16'],
        ], [
        ], [
            'avatar' => trans('setting.avatar'),
            'name' => trans('setting.name'),
            'birthday' => trans('setting.birthday'),
            'mobile' => trans('setting.mobile'),
            'country' => trans('setting.country'),
            'address' => trans('setting.address'),
            'postal_code' => trans('setting.postal_code'),
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $user = Auth::user();

        if (isset($data['avatar'])) {
            $fileName = $user->affiliate_id . '.' . $request->avatar->extension();

            $request->avatar->move(public_path('uploads/avatar'), $fileName);
            $avatar = url('uploads/avatar') . '/' . $fileName;
        } else {
            $avatar = $user->avatar;
        }

        try {
            $user->avatar = $avatar;
            $user->name = $data['name'];
            $user->birthday= date('Y-m-d', strtotime($data['birthday']));
            $user->gender = $data['gender'];
            $user->mobile= $data['mobile'];
            $user->country= $data['country'];
            $user->address= $data['address'];
            $user->postal_code= $data['postal_code'];
            $user->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['failed' => trans('setting.profile_failed_msg')]);
        }

        return redirect()->route('setting')->with('success', trans('setting.profile_success_msg'));
    }

    public function updatePassword(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ], [
        ], [
            'current_password' => trans('setting.current_pwd'),
            'password' => trans('setting.new_pwd'),
            'password_confirmation' => trans('setting.new_pwd_confirm'),
        ]);

        $user = Auth::user();

        if (!Hash::check($data['current_password'], $user->password))
        {
            $validator->errors()->add('current_password', trans('setting.current_pwd_wrong'));
            $errors = $validator->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }

        try {
            $user->password = Hash::make($data['password']);
            $user->save();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['failed' => trans('setting.pwd_failed_msg'), 'pwd_failed' => trans('setting.pwd_failed_msg')]);
        }

        return redirect()->route('setting')->with('success', trans('setting.pwd_success_msg'))->with('pwd_success', trans('setting.pwd_success_msg'));
    }

    public function createQrCode(Request $request) {
        $user = Auth::user();
        $info = env('APP_URL') . '/register?aid=' . $user->affiliate_id;

        if (!extension_loaded('imagick')) {
            return response()->json('imagick not installed');
        }
        $qr_code = base64_encode(QrCode::format('png')->size(250)->merge($this->marker, .3)->encoding('UTF-8')->eyeColor(0, 0, 0, 0, 149, 42, 200)->errorCorrection('H')->generate($info));
        return response()->json($qr_code);
    }
}
