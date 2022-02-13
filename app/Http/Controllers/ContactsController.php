<?php

namespace App\Http\Controllers;

use Auth;
use Log;
use App\Models\Contacts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ContactsController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function send(Request $request) {
        Validator::make($request->all(), [
            'title' => 'required|string|max:128',
            'content' => 'required|string',
            'email' => 'required|email|string|max:128',
        ])->validate();

        $user = User::where('email', $request->input('email'))->first();
        $contact = new Contacts();
        $contact->user_id = $user? $user->id : 0;
        $contact->title = $request->input('title');
        $contact->content = $request->input('content');
        $contact->email = $request->input('email');
        $contact->reply = '';
        $contact->status = 0;
        $contact->save();
        
        return redirect()->route('contact')->with('success', trans('contact.success_msg'))->withInput();;
    }
}
