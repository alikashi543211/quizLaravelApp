<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Questionnaire\DeleteRequest;
use App\Http\Requests\Admin\Questionnaire\DetailRequest;
use App\Http\Requests\Admin\Questionnaire\StoreRequest;
use App\Http\Requests\Admin\Questionnaire\UpdateRequest;
use App\Models\Answer;
use App\Models\Questionnaire;
use App\Models\User;
use App\Models\UserQuestionnaire;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionnaireController extends Controller
{
    private $model, $answer, $user, $user_questionnaire;
    public function __construct()
    {
        $this->model = new Questionnaire();
        $this->user_questionnaire = new UserQuestionnaire();
        $this->answer = new Answer();
        $this->user = new User();
    }

    public function add()
    {
        try {
            return view("admin.questionnaire.add", get_defined_vars());
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            if(!canActionOnQuestionnaire($inputs['id'])) {
                DB::rollBack();
                return redirect()->to('admin/questionnaire/listing')->with('error', ACTION_QUESTIONNAIRE_DENIED_MESSAGE);
            }
            $ques = $this->model->newQuery()->whereId($inputs['id'])->with('answers')->first()->toArray();
            DB::commit();
            return view("admin.questionnaire.edit", get_defined_vars());
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function detail(DetailRequest $request)
    {
        try {
            $listing = $this->model->newQuery()->with('answers')->get()->toArray();
            return view("admin.questionnaire.detail", get_defined_vars());
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete(DeleteRequest $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            if(!canActionOnQuestionnaire($inputs['id'])) {
                DB::rollBack();
                return redirect()->to('admin/questionnaire/listing')->with('error', ACTION_QUESTIONNAIRE_DENIED_MESSAGE);
            }
            $this->answer->newQuery()->whereQuestionnaireId($inputs['id'])->delete();
            if(!$this->model->newQuery()->whereId($inputs['id'])->delete())
            {
                DB::rollBack();
                return redirect()->back()->with('error', GENERAL_ERROR_MESSAGE);
            }
            DB::commit();
            return redirect()->back()->with('success', GENERAL_DELETED_MESSAGE);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function listing(Request $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            $listing = $this->model->newQuery()->get();
            DB::commit();
            return view("admin.questionnaire.listing", get_defined_vars());
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            $model = $this->model->newInstance();
            $model->fill($inputs);
            if(!$model->save())
            {
                DB::rollback();
                return redirect()->back()->with('error', GENERAL_ERROR_MESSAGE);
            }
            foreach($inputs['answers'] as $answerVal)
            {
                $answer = $this->answer->newInstance();
                $answer->fill($answerVal);
                if(isset($answerVal['is_correct']))
                {
                    $answer->is_correct = 1;
                }
                $answer->questionnaire_id = $model->id;
                if(!$answer->save())
                {
                    DB::rollback();
                    return redirect()->back()->with('error', GENERAL_ERROR_MESSAGE);
                }
            }
            DB::commit();
            return redirect()->route('admin.questionnaire.listing')->with('success', GENERAL_SUCCESS_MESSAGE);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(UpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            $model = $this->model->newQuery()->whereId($inputs['id'])->first();
            $model->fill($inputs);
            if(!$model->save())
            {
                DB::rollback();
                return redirect()->back()->with('error', GENERAL_ERROR_MESSAGE);
            }

            if($this->answer->newQuery()->whereQuestionnaireId($inputs['id'])->count() > 0)
            {
                $this->answer->newQuery()->whereQuestionnaireId($inputs['id'])->delete();
            }

            foreach($inputs['answers'] as $answerVal)
            {
                $answer = $this->answer->newInstance();
                $answer->fill($answerVal);
                if(isset($answerVal['is_correct']))
                {
                    $answer->is_correct = 1;
                }
                $answer->questionnaire_id = $model->id;
                if(!$answer->save())
                {
                    DB::rollback();
                    return redirect()->back()->with('error', GENERAL_ERROR_MESSAGE);
                }
            }
            DB::commit();
            return redirect()->route('admin.questionnaire.listing')->with('success', GENERAL_UPDATED_MESSAGE);
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
