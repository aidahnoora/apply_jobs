<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apply Jobs</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition register-page">
    @include('sweetalert::alert')
    <div class="register-box">
        <div class="register-logo">
            <img src="{{ asset('AdminLTE/dist/img/energeek.png') }}" width="180" height="auto" alt="Web Image">
        </div>

        <div class="card">
            <div class="card-head">

            </div>
            <div class="card-body register-card-body" style="border-radius: 50%; font-">
                <h4 class="text-center">Apply Lamaran</h4><p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('apply/save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Cth: A'idah Noor Azzah">
                    </div>
                    <div class="form-group">
                        <label for="job_id">Jabatan</label>
                        <select class="form-control select2" name="job_id">
                            <option selected disabled value="">Pilih Jabatan</option>
                            @foreach ($jobs as $job)
                            <option value="{{ $job->id }}" {{old('id')== $job->id ? 'selected' : ''}}>{{$job->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="text" class="form-control" name="phone" placeholder="Cth: 0893239851289">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Cth: energeekmail@gmail.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="year">Tahun Lahir</label>
                        <input type="text" class="form-control" name="year" placeholder="Cth: 2000">
                        {{-- <select class="form-control" name="year">
                            <option selected disabled value="">Pilih Tahun</option>
                        </select> --}}
                    </div>
                    <div class="form-group">
                        <label for="skill_id">Skill Set</label>
                        <select class="form-control select2" multiple="multiple" name="skill_id[]" data-placeholder="Pilih Skill">
                            @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}" {{old('id')== $skill->id ? 'selected' : ''}}>{{$skill->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger btn-block" style="background: #F64E60">Apply</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <h6 class="text-center" style="padding: 5%"><a href="/login">Login Admin</a></h6>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('AdminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>

    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>
