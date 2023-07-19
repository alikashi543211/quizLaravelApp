@extends('admin.layouts.master')

@section('title', 'Report Listing')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Result</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Result</li>
        </ol>
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Correct</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span class="small text-white stretched-link">{{ $correct ?? '' }}</span>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">In Correct</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span class="small text-white stretched-link">{{ $incorrect ?? '' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Quizz Result of {{ $user->name }}
            </div>
            <div class="card-body">
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
        </div>
    </div>
</main>
@endsection
