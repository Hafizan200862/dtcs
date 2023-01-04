@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Add Appointment')

@section('content')

{{-- <div class="container-fluid">

    <!-- Page Heading -->


    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Content Row -->
    <div class="card shadow">
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="dentist">{{ __('Dentist') }}</label>
                    <select class="form-control select2" name="dentist_id">
                        @foreach($dentists as $id => $dentist)
                        <option value="{{ $id }}"> {{ $dentist }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="patient">{{ __('Patient') }}</label>
                    <select class="form-control" name="patient_id">
                        @foreach($patients as $id => $patient)
                        <option value="{{ $id }}"> {{ $patient }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_time">{{ __('Start Time') }}</label>
                    <input type="text" class="form-control datetimepicker" id="start_time" name="start_time"
                        value="{{ old('start_time') }}" />
                </div>
                <div class="form-group">
                    <label for="finish_time">{{ __('Finish Time') }}</label>
                    <input type="text" class="form-control datetimepicker" id="finish_time" name="finish_time"
                        value="{{ old('finish_time') }}" />
                </div>

                <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
            </form>
        </div>
    </div>


    <!-- Content Row -->

</div> --}}

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <a href="{{ route('admin.appointment.index') }}" type="button" class="btn btn-primary">Back</a>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

{{-- patient form --}}
<!-- Main content -->
<section class="content">
    <!-- container-fluid -->
    <div class="container-fluid">
        <!-- row -->
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
                <!-- /.message -->
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Add Appointment') }}</h3>
                    </div>
                    <!-- /.card-header -->             
                    <!-- form start -->
                    <form action="{{ route('adminAddDentist') }}" method="post">
                    {{-- <form action="{{ route('adminAddAppointmentForm') }}" method="post"> --}}
                        
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="title" class="form-control" name="title" placeholder="Enter Title" value="{{ old('title') }}">
                                <span class="text-danger">@error('title'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="title" class="form-control" name="title" placeholder="Enter Title" value="{{ old('title') }}">
                                <span class="text-danger">@error('title'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="dentist">{{ __('Dentist') }}</label>
                                <input type="dentist" class="form-control" name="dentist" placeholder="Enter Dentist" value="{{ old('dentist') }}">
                                <span class="text-danger">@error('dentist'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="patient">{{ __('Patient') }}</label>
                                <input type="patient" class="form-control" name="patient" placeholder="Enter Patient" value="{{ old('patient') }}">
                                <span class="text-danger">@error('patient'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="start_time">{{ __('Start Time') }}</label>
                                <input type="start_time" class="form-control" name="start_time" placeholder="Enter Start Time" value="{{ old('start_time') }}">
                                <span class="text-danger">@error('start_time'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="finish_time">{{ __('Finish Time') }}</label>
                                <input type="finish_time" class="form-control" name="finish_time" placeholder="Enter Finish Time" value="{{ old('finish_time') }}">
                                <span class="text-danger">@error('finish_time'){{ $message }}@enderror</span>
                            </div>
                            <!-- /.card-body -->
                        <button type="submit" class="btn btn-primary">Save</button>
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
{{-- dentist form end --}}

<!-- /.card-header -->
<div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Minimal</label>
          <select class="form-control select2bs4" style="width: 100%;">
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option>California</option>
          </select>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.card-body -->

@endsection




@section('script')
{{-- <link rel="stylesheet" --}}
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

<!-- Select2 -->
{{-- <script src="../../plugins/select2/js/select2.full.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
</script>
<script>
    $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'en',
            sideBySide: true,
            icons: {
            up: 'fas fa-chevron-up',
            down: 'fas fa-chevron-down',
            previous: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right'
            },
            stepping: 10
        });
</script> --}}


@endsection