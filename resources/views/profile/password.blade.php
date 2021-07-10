@extends('backend.master')
@section('content')

    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <form method="POST" class="needs-validation" action="{{ route('password.update')}}" novalidate="">
                        @csrf
                        <div class="card-header">
                            <h4>Update Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label for="old_password">Old Password</label>
                                    <input class="form-control" type="password" id="old_password"
                                           name="old_password" placeholder="Enter your old password" required="">
                                    <div class="invalid-feedback">
                                        Please give your old password
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label for="password">New Password</label>
                                    <input type="password" id="password" class="form-control"
                                           placeholder="Enter your new password" name="password" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the new password
                                    </div>
                                </div>

                                <div class="form-group col-md-12 col-12">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" id="confirm_password" class="form-control"
                                           placeholder="Enter your new password again" name="password_confirmation">
                                    <div class="invalid-feedback">
                                        Please fill in the confirm password
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
