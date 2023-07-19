@extends('admin.layouts.master')

@section('title', 'Questionnaire Detail')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Questionnaire</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Questionnaire</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Questionnaire Detail
                </div>
                <div class="card-body">
                    <table>
                            <tr>
                                <th>
                                    How do you calculate the number of vowels and consonants in a String?
                                </th>
                            </tr>
                            <tr>
                                <td class="p-3">
                                    Answer A
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3" style="background-color: green;color:white;">
                                    Answer B
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">
                                    Answer C
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">
                                    Answer D
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
