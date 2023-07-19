@extends('admin.layouts.master')

@section('title', 'Questionnaire Listing')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Questionnaire</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Questionnaire</li>
            </ol>
            @include('layouts.includes.alert')
            <div class="p-3">
                <a class="btn btn-success" href="{{ url('admin/questionnaire/add') }}">Add New</a>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Questionnaire List
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Question</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr</th>
                                <th>Question</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($listing as $ques)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ques->title }}</td>
                                    <td>
                                        <a href="{{ url('admin/questionnaire/detail?id=' . $ques->id) }}" class="btn btn-primary">Detail</a>
                                        <a href="{{ url('admin/questionnaire/edit?id=' . $ques->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ url('admin/questionnaire/delete?id=' . $ques->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
