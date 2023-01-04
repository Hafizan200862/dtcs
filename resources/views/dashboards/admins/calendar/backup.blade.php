@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Calendar')

@section('content')

<!-- THE CALENDAR -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Calendar</h1>
            </div>
            <!-- Add Patient Button -->
            {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="#" type="button" class="btn btn-primary">Add Event</a>
                </ol>
            </div> --}}
            <!-- /.patient-button-end -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button> --}}

<!-- Modal -->
{{-- <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="title">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="saveBtn" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div> --}}

<!-- Calender section -->
<div class="col-md">
    <div class="card card-primary">
        <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->

@endsection

@section('script')

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- FullCalender css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

<!-- Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>

<!-- Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>






<!-- Page specific script -->

<script>
    $(document).ready(function() {

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        // });

        // var appointment = @json($events);
        // console.log(events)
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay,list',
            },
            // events: appointment,
            selectable: true,
            selectHelper: true,
            // select: function(start,end, allDays) 
            // {
            //     $('#appointmentModal').modal('toggle');

            //     $('#saveBtn').click(function() {
            //         var title = $('#title').val();
            //         var start_date = moment(start).format('YYYY-MM-DD');
            //         var end_date = moment(end).format('YYYY-MM-DD');

            //         $.ajax({
            //             url:"{{ route('admin.appointmentStore') }}",
            //             type:"post",
            //             dataType:'json',
            //             data:{ title, start_date, end_date},
            //             success:function(response)
            //             {
            //                 console.log(rseponse);
            //             },
            //             error:function(error)
            //             {

            //             },
            //         });

                    

            //     });
            // },
        });
    });
</script>



@endsection