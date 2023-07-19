@extends('layouts.master')

@section('title', 'Quiz')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Quiz - SoftPyramid</h3></div>

                        <div class="card-body">
                            <div class="alert alert-info">
                                Dear <strong>{{ auth()->user()->name }}</strong>
                            </div>
                            @include('layouts.includes.alert')
                            <form method="POST" action="{{ url('user/quiz/store') }}">
                                @csrf
                                <div class="card-body">
                                    <table class="table">
                                        <!-- Question and answers with corrrect and incorrect -->
                                        @foreach($listing as $quesKey => $ques)
                                            <tr>
                                                <th @if($loop->iteration > 1) class="pt-5" @endif>
                                                    <input type="hidden" name="user_questionnaire[{{$quesKey}}][questionnaire_id]" value="{{ $ques->id }}">
                                                    {{ $ques->title }}
                                                </th>
                                            </tr>
                                            @foreach($ques->answers as $answerKey => $answer)
                                                <tr>
                                                    <td class="p-3 bg-light text-dark">
                                                        <input type="radio" name="user_questionnaire[{{$quesKey}}][answer_id]" value="{{ $answer->id }}">
                                                        {{ $answer->title }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </table>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><button class="btn btn-success btn-block" type="submit">Submit</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
