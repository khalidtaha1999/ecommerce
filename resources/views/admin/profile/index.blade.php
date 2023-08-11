@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{route('admin.profile.update')}}" class="needs-validation"
                              novalidate="" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="card-header">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img width="100px" src="{{asset(auth()->user()->avatar)}}" alt="">
                                        </div>
                                        <label>Avatar</label>
                                        <input type="file" name="avatar" accept="image/*" class="form-control">

                                        @if($errors->has('avatar'))
                                            <div id="validation_error">
                                                <span class="text-danger">{{$errors->first('avatar')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{old('name')??auth()->user()->name}}"
                                               class="form-control" required maxlength="100">

                                        @if($errors->has('name'))
                                            <div id="validation_error">
                                                <span class="text-danger">{{$errors->first('name')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{old('email')??auth()->user()->email}}"
                                               class="form-control" required>

                                        @if($errors->has('email'))
                                            <div id="validation_error">
                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{route('admin.password.update')}}" class="needs-validation"
                              novalidate="" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group  col-12">
                                        <label>Current Password</label>
                                        <input type="password" name="current_password"
                                               class="form-control" maxlength="100">
                                        @if($errors->has('current_password'))
                                            <div id="validation_error">
                                                <span class="text-danger">{{$errors->first('current_password')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group  col-12">
                                        <label>New Password</label>
                                        <input type="password" name="password"
                                               class="form-control" maxlength="100">
                                        @if($errors->has('password'))
                                            <div id="validation_error">
                                                <span class="text-danger">{{$errors->first('password')}}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group  col-12">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation"
                                               class="form-control" maxlength="100">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
