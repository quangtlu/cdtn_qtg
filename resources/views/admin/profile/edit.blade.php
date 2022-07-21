@extends('layouts.admin')
@section('title', 'Thông tin cá nhân')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.profile.update', ["id" => $profile->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 border-right">
                            <div class="p-3 form-profile">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Họ tên</label>
                                        <input type="text" value="{{ old('name') ?? $profile->name }}" name="name" class="form-control" >
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Ngày sinh</label>
                                        <input type="text" data-date-format='dd/mm/yyyy' class="form-control" name="dob" value="{{ old('dob') ?? $profile->dob }}" id="dob" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Giới tính</label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value=""></option>
                                            @foreach (config('consts.user.gender') as $gender)
                                                <option {{ (old('gender') == $gender['value'] || $profile->gender == $gender['value']) ? 'selected' : '' }}  
                                                value="{{ $gender['value']  }}">{{$gender['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Email</label>
                                        <input type="text" value="{{ old('email') ?? $profile->email }}" name="email" class="form-control" >
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Điện thoại</label>
                                        <input type="text" value="{{ old('phone') ?? $profile->phone }}" name="phone" class="form-control" >
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">Password</label>
                                        <input id="password" data-toggle="password" type="password" name="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 text-center">
                                <button class="btn btn-primary profile-button " type="submit">Cập nhật</button>
                            </div>
                        </div>
                        <div class="col-md-4 mt-5">
                            <div class="">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="avatar-header">
                                        <div class="avatar-wrapper" title="Ảnh đại diện">
                                            <img class="profile-pic"  src="
                                            @if ($profile->image)
                                                {{ asset('image/profile/'.$profile->image)}}
                                            @endif "/>
                                            <div class="upload-button">
                                                <i class="fas fa-camera camera-icon" aria-hidden="true"></i>
                                            </div>
                                            <input class="file-upload" name="image" type="file" accept="image/*"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/avatar.js') }}"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.vi.min.js') }}"></script>
    <script>
        $('#dob').datepicker({
            language: 'vi',
            orientation: 'bottom',
        });
    </script>
@endsection
