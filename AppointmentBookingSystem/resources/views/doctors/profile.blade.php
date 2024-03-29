@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <h3 class=>Profile</h3>
            <div class="row">
                <div class="col-md-3 ">
                    <div class="card card-secondary card-outline" style="width: 100%; height: 240px; margin: 0 auto;">
                        <div class="card-body box-profile ">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('storage/' . $doctor->image) }}" alt="Profile Image">
                            </div>


                            <h3 class="profile-username text-center">
                                {{ $doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname }}</h3>

                            <p class="text-muted text-center">
                                @if ($doctor->role == 0)
                                    Admin
                                @elseif($doctor->role == 1)
                                    Doctor
                                @else
                                    User
                                @endif
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-md-9 ">
                    <div class="card">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fa fa-book mr-1"></i> Basic Information</strong>
                                <div class="basic text-muted d-flex justify-content-between ">
                                    <div class="container">
                                        <div class="row m-3">
                                            <div class="col-sm-4">
                                                <b>Date of Birth: </b>{{ $doctor->dob }}
                                            </div>
                                            <div class="col-sm-4">
                                                <b>Gender: </b> {{ $doctor->gender }}
                                            </div>
                                            <div class="col-sm-4">
                                                <b>Contact: </b> {{ $doctor->contact }}
                                            </div>
                                        </div>
                                        <div class="row m-3">
                                            <div class="col-sm-4"> <b>Email:</b> {{ $doctor->email }}</div>
                                            <div class="col-sm-4"> <b>License No:</b> {{ $doctor->license_no }}</div>
                                            <div class="col-sm-4"><b>Department: </b>
                                                {{ $doctor->department->departmentName }}</div>
                                        </div>
                                        <div class="row mt-3 ml-3">
                                            <div class="col-sm-4"><b>Specialization: </b> {{ $doctor->specialization }}
                                            </div>
                                            <div class="col-sm-4"><b>Status: </b>
                                                @if ($doctor->status == 0)
                                                    Inactive
                                                @else
                                                    Active
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row mt-4">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <div class="col-md-3">
                                        <th>Institution</th>
                                    </div>
                                    <div class="col-md-3">
                                        <th>Level</th>
                                    </div>
                                    <div class="col-md-3">
                                        <th>Board</th>
                                    </div>
                                    <div class="col-md-3">
                                        <th>Completion Year</th>
                                    </div>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctor->education as $list)
                                    <tr>
                                        <div class="col-md-3">
                                            <td>{{ $list->institution }}</td>
                                        </div>
                                        <div class="col-md-3">
                                            <td>{{ $list->level }}</td>
                                        </div>
                                        <div class="col-md-3">
                                            <td>{{ $list->board }}</td>
                                        </div>
                                        <div class="col-md-3">
                                            <td>{{ $list->completion_year }}</td>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-4">
                    <strong><i class="fa fa-lightbulb mr-1"></i> Experience</strong>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <div class="col-md-3">
                                        <th>Organization</th>
                                    </div>
                                    <div class="col-md-3">
                                        <th>Position</th>
                                    </div>
                                    <div class="col-md-3">
                                        <th>Start Date</th>
                                    </div>
                                    <div class="col-md-3">
                                        <th>End Date</th>
                                    </div>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctor->experience as $list2)
                                    <tr>
                                        <div class="col-md-3">
                                            <td>{{ $list2->organization }}</td>
                                        </div>
                                        <div class="col-md-3">
                                            <td>{{ $list2->position }}</td>
                                        </div>
                                        <div class="col-md-3">
                                            <td>{{ $list2->start_date }}</td>
                                        </div>
                                        <div class="col-md-3">
                                            <td>{{ $list2->end_date }}</td>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
