@extends('admin.layouts.master')

@section('title', 'Report Listing')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Reports</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Reports</li>
            </ol>
            @include('layouts.includes.alert')
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Reports
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($listing as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!$user->is_quiz_submitted)
                                            <button class="btn btn-primary" disabled="true">Result</button>
                                        @else
                                            <a href="{{ url('admin/report/result?id=' . $user->id) }}" class="btn btn-primary" disabled="true">Result</a>
                                        @endif
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
