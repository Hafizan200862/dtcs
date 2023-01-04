@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Add Dentist')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <a href="{{ route('admin.dentist.index') }}" type="button" class="btn btn-primary">Back</a>
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
                        <h3 class="card-title">Register Dentist</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('adminAddDentist') }}" method="post">
                        @csrf
                        <div class="card-body">
                            {{-- <div class="form-group">
                                <label for="">IC No</label>
                                <input type="ic" class="form-control" name="ic" placeholder="Enter IC No"
                                    value="{{ old('ic') }}">
                                <span class="text-danger">@error('ic'){{ $message }}@enderror</span>
                            </div> --}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="name" class="form-control" name="name" placeholder="Enter Name"
                                    value="{{ old('name') }}">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email"
                                    value="{{ old('email') }}">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" data-eye
                                    placeholder="Enter password">
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required data-eye placeholder="Enter confirm password">
                                <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>

                            </div>
                            <div class="form-group">
                                <label for="phone">Phone No</label>
                                <input type="phone" class="form-control" name="phone" placeholder="Enter Phone No"
                                    value="{{ old('phone') }}">
                                <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select id="gender" class="form-control" name='gender'
                                            value="{{ old('gender') }}">
                                            <option value='male'> Male </option>
                                            <option value='female'> Female </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
{{-- dentist form end --}}

@endsection

@section('script')
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- DataTables  & Plugins -->
{{-- <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> --}}



<!-- SCRIPTS END-->
@endsection