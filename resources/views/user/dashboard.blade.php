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
                                Welcome <strong>John Doe</strong>
                            </div>
                            <div>
                                <a href="{{ url('user/quiz') }}" class="btn btn-success">Start Quiz</a>
                                <a href="{{ url('user/quiz/result') }}" class="btn btn-danger">Show Result</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
