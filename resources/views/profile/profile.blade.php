@extends('backend.master')
@section('content')
    <!-- Main Content -->

    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="{{ asset(auth()->user()->image) }}"
                             class="rounded-circle profile-widget-picture">
                        <h2 class="section-title">{{ Auth::user()->name }}</h2>
                        <p class="section-lead">
                            Change information about yourself on this page.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="POST" class="needs-validation" action="{{ route('profile.update')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"
                                           required="">
                                    <div class="invalid-feedback">
                                        Please fill in the name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username"
                                           value="{{ Auth::user()->username }}" required="">
                                    <div class="invalid-feedback">
                                        Please fill in the username
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email"
                                           value="{{ Auth::user()->email }}">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control" name="phone"
                                           value="{{ Auth::user()->phone }}">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
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
