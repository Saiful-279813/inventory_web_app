<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticateController extends Controller
{
    /* =============== Login =============== */
    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:11',
            'password' => 'required',
        ]);

        try {
            $credential = ['phone' => $request->phone, 'password' => $request->password, 'status' => 1];
            if (Auth::guard('admin')->attempt($credential)) {
                $auth_credential = Auth::guard('admin')->user();
                Session::put([
                    'admin' => [
                        'id' => $auth_credential->id,
                        'name' => $auth_credential->name,
                    ],

                ]);
                return send_ms('Login successfully', true);
            } else {
                return send_ms('Sorry :) in-valid login information', true);
            }
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), true);
        }
    }

    // ======================= Check Authenticate =======================
    public function checkAuth()
    {
        try {
            if (Auth::guard('admin')->user()) {
                $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
                $token = Hash::make(rand(11111, 99999) . 'admin-' . $admin->id);
                return response()->json([
                    'status' => 'AUTHORIZED',
                    'message' => 'you are login now',
                    'token' => $token,
                ]);
            } else {
                return response()->json([
                    'status' => 'UNAUTHORIZED',
                    'message' => 'you are not login',
                ]);
            }
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }

    // =================== check authenticate ===================
    public function checkAuthenticate()
    {
        try {
            if (Auth::guard('admin')->user()) {
                $admin = Admin::where('id', Auth::guard('admin')->user()->id)->select('id','name','phone')->first();
                return response()->json([
                    'status' => 'AUTHORIZED',
                    'message' => 'you are login now',
                    'admin' => $admin,
                ]);
            } else {
                return send_ms('you are not login', 'UNAUTHORIZED');
            }
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), 'UNAUTHORIZED');
        }
    }

    // =================== Logout ===================
    public function logout()
    {
        try {
            Auth::guard('admin')->logout();
            session()->forget('admin');
            return send_ms('Logout successfully', true);
        } catch (\Throwable $th) {
            return send_ms($th->getMessage(), false);
        }
    }
    /* ================= End Class ================= */
}
