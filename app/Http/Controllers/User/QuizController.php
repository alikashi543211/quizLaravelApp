<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Quiz\StoreRequest;
use App\Models\Answer;
use App\Models\Questionnaire;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    private $model, $answer, $user;
    public function __construct()
    {
        $this->model = new Questionnaire();
        $this->answer = new Answer();
        $this->user = new User();
    }

    public function quizForm()
    {
        try {
            DB::beginTransaction();
            $quiz = $this->model->newQuery()->with('answers')->get();
            DB::commit();
            return view("user.quiz.home", get_defined_vars());
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function result()
    {
        try {
            DB::beginTransaction();
            $quiz = $this->model->newQuery()->with('answers')->get();
            DB::commit();
            return view("user.quiz.result", get_defined_vars());
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            $user = $this->model->newInstance();
            $user->fill($inputs);
            $user->role_id = ROLE_USER;
            if (!$user->save()) {
                DB::rollback();
                return redirect()->back()->with('error', GENERAL_ERROR_MESSAGE);
            }
            Auth::login($user);
            DB::commit();
            return redirect()->route('user.quiz.result');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
