@extends('dashboards.dentists.layouts.dentist-dash-layout')
@section('title','Add Appointment')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <ol class="breadcrumb float-sm-left">
                    <a href="{{ route('admin.appointment.index') }}" type="button" class="btn btn-primary">Back</a>
                </ol> --}}
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{ route('dentist.appointment.index') }}" type="button" class="btn btn-primary">Back</a>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-sm-3">
            </div>
            <!--/.col (left) -->
            <!-- center column -->
            <div class="col-sm-6">
                <!-- message -->
                <div class="">
                    @if ( Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if ( Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                </div>
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Add Appointment') }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button> --}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {{-- <form action="{{ route('adminAddAppointment') }}" method="post"> --}}
                        {{-- @csrf --}}
                        {{-- <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>{{ __('Title') }}</label>
                                        <input type="title" class="form-control" id="title" name="title"
                                            placeholder="Enter Title" value="{{ old('title') }}">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="row">
                                        <!-- Start Date and time -->
                                        <div class="form-group col-md-6 float-left">
                                            <label>{{ __('Start Date and Time:') }}</label>
                                            <div class="input-group date" id="startdatetime"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdatetime" />
                                                <div class="input-group-append" data-target="#startdatetime"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.form group -->
                                        <!-- Finish Date and time -->
                                        <div class="form-group col-md-6 float-right">
                                            <label>{{ __('Finish Date and Time:') }}</label>
                                            <div class="input-group date" id="finishdatetime"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdatetime" />
                                                <div class="input-group-append" data-target="#finishdatetime"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Dentist') }}</label>
                                        <select class="form-control select2" id="dentist" style="width: 100%;">
                                            @foreach($dentists as $id => $dentist)
                                            <option value="{{ $id }}"> {{ $dentist }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>{{ __('Patient') }}</label>
                                        <select class="form-control select2" id="patient" style="width: 100%;">
                                            @foreach($patients as $id => $patient)
                                            <option value="{{ $id }}"> {{ $patient }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- /.card-body -->
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div> --}}
                        <!-- /.card-body -->
                        {{--
                    </form> --}}

                    <form action="{{ route('dentistAddAppointment') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="title" class="form-control" id="title" name="title"
                                    placeholder="Enter Title" value="{{ old('title') }}">
                                <span class="text-danger">@error('title'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="dentist">{{ __('Dentist') }}</label>
                                <select class="form-control select2" id="user_id" name="user_id">
                                    @foreach($dentists as $id => $dentist)
                                    <option value="{{ $id }}"> {{ $dentist }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="client">{{ __('Patient') }}</label>
                                <select class="form-control select2" id="patient_id" name="patient_id">
                                    @foreach($patients as $id => $patient)
                                    <option value="{{ $id }}"> {{ $patient }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.card-body -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="start_time">{{ __('Start Date and Time') }}</label>
                                        <div class="input-group date" id="startdatetime" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#startdatetime" name="start_time" />
                                            <div class="input-group-append" data-target="#startdatetime"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="form-group">
                                        <label for="finish_time">{{ __('Finish Date and Time') }}</label>
                                        <div class="input-group date" id="finishdatetime" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#finishdatetime" name="finish_time" />
                                            <div class="input-group-append" data-target="#finishdatetime"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.column -->
                            </div>
                            <!-- /.row -->
                            <!-- /.card-body -->
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (center) -->
            <!-- right column -->
            <div class="col-sm-3">
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection




@section('script')

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">



<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Date and time picker
    $('#startdatetime').datetimepicker({ 
        format: 'YYYY-MM-DD HH:mm',
        icons: { time: 'far fa-clock' } });
    $('#finishdatetime').datetimepicker({ 
        format: 'YYYY-MM-DD HH:mm',
        icons: { time: 'far fa-clock' } });

  })
  

  

</script>




@endsection