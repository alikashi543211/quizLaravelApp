@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Dashboard</h3></div>
                        <div class="card-body">
                            <div class="alert alert-info">
                                Welcome <strong>{{ auth()->user()->name }}</strong>
                            </div>
                            <div class="my-5">
                                @if(auth()->user()->is_quiz_submitted)
                                    <button class="btn btn-success" disabled>Start Quiz</button>
                                    <a href="{{ url('user/quiz/result') }}" class="btn btn-danger @if(!auth()->user()->is_quiz_submitted) d-none @endif">Show Result</a>
                                @else
                                    <a href="{{ url('user/quiz') }}" class="btn btn-success @if(auth()->user()->is_quiz_submitted) d-none @endif">Start Quiz</a>
                                    <button class="btn btn-danger" disabled>Show Result</button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
