@extends('admin.layouts.master')

@section('title', 'Edit Questionnaire')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Questionnaire</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Questionnaire</li>
            </ol>
            @include('layouts.includes.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Questionnaire
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('admin/questionnaire/update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $ques['id'] }}">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" value="{{ $ques['title'] }}" name="title" type="text" placeholder="Questionnaire Here.." />
                            <label for="inputEmail">Questionnaire</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" name="answers[0][title]" value="{{ $ques['answers'][0]['title'] }}" type="text" placeholder="Create a password" />
                                    <label for="inputPassword">Answer A</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="answers[0][is_correct]" @if($ques['answers'][0]['is_correct']) checked @endif  type="checkbox" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Correct Answer
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" name="answers[1][title]" value="{{ $ques['answers'][1]['title'] }}" type="text" placeholder="Create a password" />
                                    <label for="inputPassword">Answer B</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="answers[1][is_correct]" @if($ques['answers'][1]['is_correct']) checked @endif id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Correct Answer
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword"  name="answers[2][title]" value="{{ $ques['answers'][2]['title'] }}" type="text" placeholder="Create a password" />
                                    <label for="inputPassword">Answer C</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="answers[2][is_correct]" @if($ques['answers'][2]['is_correct']) checked @endif id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Correct Answer
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" type="text" name="answers[3][title]" value="{{ $ques['answers'][3]['title'] }}" placeholder="Create a password" />
                                    <label for="inputPassword">Answer D</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="answers[3][is_correct]" @if($ques['answers'][3]['is_correct']) checked @endif id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Correct Answer
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Update</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
