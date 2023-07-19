<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new User();
    }

    public function registerForm()
    {
        try {
            return view("auth.register");
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            $user = $this->model->newInstance();
            $user->fill($inputs);
            $user->role_id = ROLE_USER;
            $user->password = Hash::make($inputs['password']);
            if (!$user->save()) {
                DB::rollback();
                return redirect()->back()->with('error', GENERAL_ERROR_MESSAGE);
            }
            Auth::login($user);
            DB::commit();
            return redirect()->to('user/dashboard');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
