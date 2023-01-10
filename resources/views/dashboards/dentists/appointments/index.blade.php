@extends('dashboards.dentists.layouts.dentist-dash-layout')
@section('title', 'Appointment')

@section('content')

    <!-- Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Appointment(s)</h1>
                </div>
                <!-- Add Appointment Button -->
                {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{ route('dentistAddAppointmentForm') }}" type="button" class="btn btn-primary">Add
                        Appointment</a>
                </ol>
            </div> --}}
                <!-- /.appointment-button-end -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- List Appointment -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features from appointment/index</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="listAppointmentTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Dentist(s)</th>
                                        <th>Patient(s)</th>
                                        <th>Start Time</th>
                                        <th>Finish Time</th>
                                        <th>Start Appointment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($appointments as $appointment)
                                        <tr data-entry-id="{{ $appointment->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <!-- $appointment->dentist(nama method)->name -->
                                            <td>{{ $appointment->dentist->name }}</td>
                                            <td>{{ $appointment->patient->name }}</td>
                                            <td>{{ $appointment->start_time }}</td>
                                            <td>{{ $appointment->finish_time }}</td>
                                            <td>
                                                <a href="{{ route('dentistAddSessionForm', $appointment->id) }}"
                                                    type="button" class="btn btn-primary">Start Appointment</a>
                                            </td> <!-- start appointment -->
                                            <td>
                                                <div class="btn-group btn-group">
                                                    <a href="" class="btn btn-info">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <form onclick="return confirm('are you sure ? ')" class="d-inline"
                                                        action="" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger"
                                                            style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.content-end -->
@endsection

@section('script')
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
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
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#listAppointmentTable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#listAppointmentTable_wrapper .col-md-6:eq(0)');
        });
    </script>
    <!-- /.script -->

    <!-- SCRIPTS END-->
@endsection
