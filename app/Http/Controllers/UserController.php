<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function registration(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'login' => 'required|string|regex:/^([A-Za-z0-9-]*)$/u|unique:App\Models\User,login',
            'email' => 'required|string|email:rfc|unique:App\Models\User,email',
            'password' => 'required|string|min:6',
            'password_repeat' => 'required|string|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        } else {
            $user = User::create([
                'login' => $r->login,
                'email' => $r->email,
                'password' => Hash::make($r->password),
            ]);


            return response()->json(['register' => 'success'], 200);
        }
    }

    public function authentication(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'auth_login' => 'required',
            'auth_password' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        } else {
            if (Auth::attempt(['login' => $r->auth_login, 'password' => $r->auth_password])) {
                event(new Registered(Auth::user()));
                return response()->json(['authentication' => 'success'], 200);
            } else {
                return response()->json(['errors' => ['auth' => 'Ошибка авторизации']], 401);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function forgot_password(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'email_password' => 'required|string|email:rfc',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        } else {
            $status = Password::sendResetLink(
                [
                    'email' => $r->email_password
                ]
            );
            if ($status === Password::RESET_LINK_SENT) {
                return response()->json(['forgot_password' => 'success'], 200);
            } else {
                return response()->json(['errors' => ['forgot' => 'Неверный адресс электронной почты!']], 401);
            }
        }
    }

    public function update_password(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'token' => 'required',
            'newemail' => 'required|string|email:rfc',
            'newpassword' => 'required|string|min:6',
            'newpassword_repeat' => 'required|string|same:newpassword',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        } else {
            $status = Password::reset([
                'token' => $r->token,
                'email' => $r->newemail,
                'password' => $r->newpassword,
                // 'password_repeat'=>$r->newpassword_repeat
            ], function ($user) use ($r) {
                $user->forceFill([
                    'password' => Hash::make($r->newpassword),
                    'remember_token' => Str::random(60)
                ])->save();
            });

            if ($status === Password::PASSWORD_RESET) {
                return response()->json(['update_password' => 'success'], 200);
            }

            return back()->withInput($r->only('email'))->withErrors(['email' => trans($status)]);
        }
    }
}
