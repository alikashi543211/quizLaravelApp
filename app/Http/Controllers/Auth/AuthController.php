<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new User();
    }

    public function loginForm()
    {
        try {
            return view("auth.login");
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            if ($user  = $this->model->newQuery()->where('email', $inputs['email'])->first()) {
                if (Hash::check($inputs['password'], $user->password)) {
                    Auth::login($user);
                    if($user->role_id == ROLE_USER)
                    {
                        DB::commit();
                        return redirect()->to('user/dashboard');
                    }else{
                        DB::commit();
                        return redirect()->to('admin/dashboard');
                    }
                }
            }
            DB::rollback();
            return redirect()->back()->with('error', "Username or password is incorrect");

        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            DB::beginTransaction();
            Auth::logout();
            $request->session()->invalidate();
            return redirect()->to('auth/login');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
