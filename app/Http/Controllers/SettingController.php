<?php

namespace App\Http\Controllers;

use Auth;
use Log;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $user = Auth::user();

        $countries = Country::all()->toArray();
        $data['country_list'] = $countries;

        return view('setting', $data);
    }

    public function updateProfile(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'avatar' => ['nullable', 'mimes:jpg,bmp,jpeg,png'],
            'name' => ['required', 'string', 'max:128'],
            'birthday' => ['nullable', 'date'],
            'mobile' => ['required', 'string', 'max:20', 'regex:/^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/'],
            'country' => ['required', 'string', 'max:64'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:16', 'regex:/^\d{5}$/'],
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
            $fileName = $user->login_id . '.' . $request->avatar->extension();

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
}
