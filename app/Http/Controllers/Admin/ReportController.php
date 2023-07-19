<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Report\ResultRequest;
use App\Models\Answer;
use App\Models\Questionnaire;
use App\Models\User;
use App\Models\UserQuestionnaire;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    private $model, $questionnaire, $answer, $user, $user_questionnaire;
    public function __construct()
    {
        $this->questionnaire = new Questionnaire();
        $this->user_questionnaire = new UserQuestionnaire();
        $this->answer = new Answer();
        $this->model = new User();
    }

    public function listing(Request $request)
    {
        try {
            DB::beginTransaction();
            $inputs = $request->all();
            $listing = $this->model->newQuery()->get();
            DB::commit();
            return view("admin.report.listing", get_defined_vars());
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function result(ResultRequest $request)
    {
        try {
            DB::beginTransaction();
            $questionnaireList = $this->model->newQuery()->get();
            DB::commit();
            return view("admin.report.result", get_defined_vars());
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
