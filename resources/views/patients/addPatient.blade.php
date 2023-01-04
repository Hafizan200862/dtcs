@extends('dashboards.admins.layouts.admin-dash-layout')
{{-- @extends('layouts.app') --}}
@section('title','Add Patient')

@section('content')
{{-- patient form --}}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <form action="{{ route('adminAddPatient') }}" method="post">

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

                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name"
                        value="{{ old('name') }}">
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Email"
                        value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone No"
                        value="{{ old('phone') }}">
                    <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter Address"
                        value="{{ old('address') }}">
                    <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                    <label for="">Gender</label>
                    <div class="">
                        <select id="gender" name='gender' class="form-control" value="{{ old('gender') }}">
                            <option value=''> --Select-- </option>
                            <option value='male'> Male </option>
                            <option value='female'> Female </option>
                        </select>

                    </div>
                    <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block col-md-6">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection