@extends('backend.layouts.app')
@section('action','Sửa')
@section('content')
@include('flash::message')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa user</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="user_name">User name</label>
                                        <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $user->user_name }}" placeholder="Nhập tên user">
                                    </div>
                                </div>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}" placeholder="Nhập password">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="full_name">Full name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $user->full_name }}" placeholder="Nhập họ tên">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" id="age" name="age" value="{{ $user->age }}" placeholder="Nhập tuổi">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gender</label>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="gender" value="1" {{ ($user->gender == 1)? 'checked':'' }}>
                                                Male</label>

                                            <label>
                                                <input type="checkbox" name="gender" value="0" {{ ($user->gender == 0)? 'checked':'' }}>
                                                Female</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="active_time">Date and time:</label>
                                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="active_time" id="active_time" data-target="#reservationdatetime" value="{{ $user->active_time }}" />
                                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="exampleInputEmail1">Is Active</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="is_active" value="1" {{ ($user->is_active == 1)? 'checked':'' }}>On
                                        </label>

                                        <label>
                                            <input type="checkbox" name="is_active" value="0" {{ ($user->is_active == 0)? 'checked':'' }}>Off
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="ukey">Ukey</label>
                                        <input type="text" class="form-control" id="ukey" name="ukey" value="{{ $user->ukey }}" placeholder="Nhập ukey">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="invite_id">Invite</label>
                                        <input type="text" class="form-control" id="invite_id" name="invite_id" value="{{ $user->invite_id }}" placeholder="Nhập ID người mời">
                                    </div>
                                </div>

                            </div>


                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" id="submit" class="btn btn-primary">Lưu lại</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<script>
    $(document).ready(function() {
        $('#submit').click(function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            let user_name = $('input[name=user_name]').val();
            let password = $('input[name=password]').val();
            let full_name = $('input[name=full_name]').val();
            let age = $('input[name=age]').val();
            let gender = $('input[name=gender]').val();
            let phone = $('input[name=phone]').val();
            let active_time = $('input[name=active_time]').val();
            let ukey = $('input[name=ukey]').val();
            let is_active = $('input[name=is_active]').val();
            let invite_id = $('input[name=invite_id]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('user.edit',$user->id) }}",
                type: "post",
                dataType: "json",
                data: {
                    user_name: user_name,
                    password: password,
                    full_name: full_name,
                    age: age,
                    gender: gender,
                    phone: phone,
                    active_time: active_time,
                    ukey: ukey,
                    is_active: is_active,
                    invite_id: invite_id,
                },
                success: function(data) {
                    alert('Sửa thành công!!!')
                    window.location.href = "{{ route('user.list') }}";
                }
            });
        });
    });
</script>
@endsection