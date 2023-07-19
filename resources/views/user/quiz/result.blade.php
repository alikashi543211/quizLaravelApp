@extends('layouts.master')

@section('title', 'Quiz Result')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Quiz Result - SoftPyramid</h3></div>
                        <div class="card-body">
                            <form>
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        Dear <strong>{{ auth()->user()->name }}</strong>
                                    </div>
                                    <div class="py-3">
                                        Correct
                                        <span class="badge bg-success">
                                            {{ $correct ?? '' }}
                                        </span>
                                        InCorrect
                                        <span class="badge bg-danger">
                                            {{ $incorrect ?? '' }}
                                        </span>
                                    </div>
                                    <table class="table">
                                        <!-- Question and answers with corrrect and incorrect -->
                                        @foreach($listing as $quesKey => $ques)
                                            <tr>
                                                <th @if($loop->iteration > 1) class="pt-5" @endif>
                                                    <input type="hidden" name="user_questionnaire[{{$quesKey}}][questionnaire_id]" value="{{ $ques['id'] }}">
                                                    {{ $ques['title'] }}
                                                </th>
                                            </tr>
                                            @foreach($ques['answers'] as $answerKey => $answer)
                                                <tr>
                                                    <td class="p-3 @if($answer['id'] == $answer['user_answer_id'] && !$answer['is_correct']) bg-danger text-white @elseif($answer['is_correct']) bg-success text-white @else bg-light text-dark @endif">
                                                        {{ $answer['title'] }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
