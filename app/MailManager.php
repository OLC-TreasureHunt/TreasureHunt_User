<?php

namespace App;

use Mail;
use Log;
use Session;
use App\User;
use App\Models\Master;

class MailManager
{
    public static function send_verifymail($user) {
        $mailData = [
            'name' => $user['name'],
            'url' => route('activation.account') . '/' . $user['token'],
            'email' => $user['email'],
        ];

        try {
            Mail::send('emails.activate', $mailData, function($message) use ($user)
            {
                $message->to($user['email'])->subject(trans('message.mail.activate'));
            });

            return true;
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public static function send_pay_mail($params) {
        $masterTbl = new Master();
        $bankName = $masterTbl->getValue(MASTER_SYSTEM_BANK_NAME);
		$bankAccountNo = $masterTbl->getValue(MASTER_SYSTEM_BANK_ACCOUNT_NUMBER);
		$bankAccountName = $masterTbl->getValue(MASTER_SYSTEM_BANK_ACCOUNT_NAME);

        $allCrypto = Session::get('all_crypto');

        $mailData = [
			'userName'		=> $params['name'],
            'src_amount'    => $params['src_amount'],
            'src_currency'     => $params['src_currency'],
            'dst_amount'    => $params['dst_amount'],
            'dst_currency'     => $params['dst_currency'],
            'date'          => date(('Y年m月d日、H時i分')),
            'allCrypto'      => $allCrypto,

            'bankName'			=> $bankName,
			'accountNo'		=> $bankAccountNo,
			'accountName'	=> $bankAccountName
        ];

        try {
            Mail::send('emails.pay_email', $mailData, function($message) use ($params)
            {
                $message->to($params['email'])->subject(sprintf(trans('message.title.pay'), env('APP_NAME')));
            });

            return true;
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    public static function send_replymail($user) {
        $mailData = [
            'name'      => $user['name'],
            'email'     => $user['email'],
            'subject'   => $user['subject'],
            'msg'       => $user['message'],
            'reply'     => $user['reply'],
        ];

        try {
            Mail::send('emails.reply', $mailData, function($message) use ($user)
            {
                $message->to($user['email'])->subject(trans('message.mail.reply'));
            });

            return true;
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

    //=======================================
    public static function send_forgotmail($user) {

        $mailData = [
            'name' => $user['name'],
            'url' => cUrl('password/reset') . '/' . $user['remember_token'],
            'email' => $user->email,
        ];

        try {
            Mail::send('emails.forgot', $mailData, function($message) use ($user) {
                $message->to($user['email'])->subject(trans('message.mail.forgot'));
            });

            return true;
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
