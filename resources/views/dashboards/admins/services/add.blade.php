@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Add Services')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <a href="{{ route('admin.service.index') }}" type="button" class="btn btn-primary">Back</a>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

{{-- service form --}}
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
                        <h3 class="card-title">Add Services</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.service.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="service_name" class="form-control" name="service_name" placeholder="Enter Name"
                                    value="{{ old('service_name') }}">
                                <span class="text-danger">@error('service_name'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="service_price" class="form-control" name="service_price" placeholder="Enter Price"
                                    value="{{ old('service_price') }}">
                                <span class="text-danger">@error('service_price'){{ $message }}@enderror</span>
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
{{-- patient form end --}}

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