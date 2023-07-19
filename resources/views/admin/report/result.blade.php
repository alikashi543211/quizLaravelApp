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
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Correct</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span class="small text-white stretched-link">7</span>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">In Correct</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span class="small text-white stretched-link">7</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Attempted</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span class="small text-white stretched-link">7</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Not Attempted</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span class="small text-white stretched-link">7</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Quizz Result of John Doe
            </div>
            <div class="card-body">
                <table class="table">
                    <!-- Question and answers with corrrect and incorrect -->
                        <tr>
                            <th class="pt-5">
                                How do you calculate the number of vowels and consonants in a String?
                            </th>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer A
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-success text-white">
                                Answer B
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer C
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-danger text-white">
                                Answer D
                            </td>
                        </tr>

                        <tr>
                            <th class="pt-5">
                                How do you calculate the number of vowels and consonants in a String?
                            </th>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer A
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-success text-white">
                                Answer B
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer C
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-danger text-white">
                                Answer D
                            </td>
                        </tr>

                        <tr>
                            <th class="pt-5">
                                How do you calculate the number of vowels and consonants in a String?
                            </th>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer A
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-success text-white">
                                Answer B
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer C
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-danger text-white">
                                Answer D
                            </td>
                        </tr>

                        <tr>
                            <th class="pt-5">
                                How do you calculate the number of vowels and consonants in a String?
                            </th>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer A
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-success text-white">
                                Answer B
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer C
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-danger text-white">
                                Answer D
                            </td>
                        </tr>

                        <tr>
                            <th class="pt-5">
                                How do you calculate the number of vowels and consonants in a String?
                            </th>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer A
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-success text-white">
                                Answer B
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer C
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-danger text-white">
                                Answer D
                            </td>
                        </tr>

                        <tr>
                            <th class="pt-5">
                                How do you calculate the number of vowels and consonants in a String?
                            </th>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer A
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-success text-white">
                                Answer B
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer C
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-danger text-white">
                                Answer D
                            </td>
                        </tr>

                        <tr>
                            <th class="pt-5">
                                How do you calculate the number of vowels and consonants in a String?
                            </th>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer A
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-success text-white">
                                Answer B
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer C
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-danger text-white">
                                Answer D
                            </td>
                        </tr>

                        <tr>
                            <th class="pt-5">
                                How do you calculate the number of vowels and consonants in a String?
                            </th>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer A
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-success text-white">
                                Answer B
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer C
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-danger text-white">
                                Answer D
                            </td>
                        </tr>

                        <tr>
                            <th class="pt-5">
                                How do you calculate the number of vowels and consonants in a String?
                            </th>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer A
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-success text-white">
                                Answer B
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer C
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-danger text-white">
                                Answer D
                            </td>
                        </tr>

                        <tr>
                            <th class="pt-5">
                                How do you calculate the number of vowels and consonants in a String?
                            </th>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer A
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-success text-white">
                                Answer B
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3">
                                Answer C
                            </td>
                        </tr>
                        <tr>
                            <td class="p-3 bg-danger text-white">
                                Answer D
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
