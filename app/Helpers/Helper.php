<?php

use Illuminate\Support\Facades\DB;

    function updateQuestionnaireList(&$list, $userId)
    {
        foreach($list as $qKey => $q)
        {
            foreach($q['answers'] as $ansKey => $ans)
            {
                $list[$qKey]['answers'][$ansKey]['user_answer_id'] = null;
                $list[$qKey]['answers'][$ansKey]['correct_answer_id'] = null;

                if(DB::table('user_questionnaires')->whereQuestionnaireId($q['id'])->whereUserId($userId)->first())
                {
                    $list[$qKey]['answers'][$ansKey]['user_answer_id'] = DB::table('user_questionnaires')->whereQuestionnaireId($q['id'])->whereUserId($userId)->first()->answer_id;
                }
                if(DB::table('answers')->whereQuestionnaireId($q['id'])->whereIsCorrect(true)->first())
                {
                    $list[$qKey]['answers'][$ansKey]['correct_answer_id'] = DB::table('answers')->whereQuestionnaireId($q['id'])->whereIsCorrect(true)->first()->id;
                }
            }
        }
    }

    function getCorrectAnswersCount($userId)
    {
        return DB::table("user_questionnaires")->whereUserId($userId)->whereIsCorrect(true)->count();
    }

    function getInCorrectAnswersCount($userId)
    {
        return DB::table("user_questionnaires")->whereUserId($userId)->whereIsCorrect(false)->count();
    }
