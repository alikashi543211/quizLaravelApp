<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Quiz\StoreRequest;
use App\Models\Answer;
use App\Models\Questionnaire;
use App\Models\User;
use App\Models\UserQuestionnaire;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    private $model, $questionnaire, $answer, $user, $user_questionnaire;
    public function __construct()
    {
        $this->questionnaire = new Questionnaire();
        $this->model = new UserQuestionnaire();
        $this->answer = new Answer();
        $this->user = new User();
    }

    public function quizForm()
    {
        try {
            DB::beginTransaction();
            if(auth()->user()->is_quiz_submitted) {
                DB::rollBack();
                return redirect()->to('user/quiz/result');
            }
            $listing = $this->questionnaire->newQuery()->with('answers')->get();
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
            $listing = $this->questionnaire->newQuery()->with('answers')->get()->toArray();
            updateQuestionnaireList($listing, auth()->user()->id);
            $correct = getCorrectAnswersCount(auth()->user()->id);
            $incorrect = getInCorrectAnswersCount(auth()->user()->id);
            DB::commit();
            return view("user.quiz.result", get_defined_vars());
        } catch (QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            foreach($inputs['user_questionnaire'] as $userQues)
            {
                if(!$this->model->newQuery()->whereQuestionnaireId($userQues['questionnaire_id'])->whereAnswerId($userQues['answer_id'])->whereUserId(auth()->user()->id)->first()){
                    $model = $this->model->newInstance();
                    $model->questionnaire_id = $userQues['questionnaire_id'];
                    $model->answer_id = $userQues['answer_id'];
                    $model->user_id = auth()->user()->id;
                    if($this->answer->newQuery()->whereQuestionnaireId($userQues['questionnaire_id'])->whereId($userQues['answer_id'])->whereIsCorrect(true)->first()) {
                        $model->is_correct = true;
                    }
                    if(!$model->save()) {
                        DB::rollback();
                        return redirect()->back()->with('error', GENERAL_ERROR_MESSAGE);
                    }
                }
            }
            $user = $this->user->newQuery()->whereId(auth()->user()->id)->first();
            $user->is_quiz_submitted = true;
            if(!$user->save())
            {
                DB::rollback();
                return redirect()->back()->with('error', GENERAL_ERROR_MESSAGE);
            }
            DB::commit();
            return redirect()->to('user/quiz/result')->with('success', 'Quiz Submitted Successfully, You can see your result Here.');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
