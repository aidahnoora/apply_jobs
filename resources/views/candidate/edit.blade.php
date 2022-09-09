@extends('layouts.main')

@section('title', 'Candidate')

@section('css')

@endsection

@section('breadcrumbs')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Candidate</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/candidate">Candidate</a></li>
                        <li class="breadcrumb-item active">Edit Candidate</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Candidates</h2>
                            <div class="card-tools">
                                <!-- Buttons, labels, and many other things can be placed here! -->
                                <!-- Here is a label for example -->
                                <a href="/candidate" class="btn btn-primary btn-sm">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('candidate/update', $candidates->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="job_id">Job</label>
                                    <select class="form-control" name="job_id">
                                        @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}" {{ $candidates->job_id == $job->id ? 'selected' : '' }}>{{ $job->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Candidate's Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $candidates->name }}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $candidates->email }}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Phone's Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $candidates->phone }}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="number" name="year" class="form-control" value="{{ $candidates->year }}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="skill_id">Skills</label>
                                    <select class="form-control" name="skill_id[]">
                                        @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}"
                                            @foreach ($candidates->skill as $value)
                                                @if ($skill->id == $value->id)
                                                    selected
                                                @endif
                                            @endforeach
                                            >{{ $skill->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('js')

@endsection
