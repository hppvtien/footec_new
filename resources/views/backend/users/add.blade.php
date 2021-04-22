@extends('backend.layouts.app')
@section('action','Thêm mới')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm mới user</h3>
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
                                            <input type="text" class="form-control" id="user_name" name="user_name"
                                                   placeholder="Nhập tên user">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder="Nhập password">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="full_name">Full name</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name"
                                                   placeholder="Nhập họ tên">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="number" class="form-control" id="age" name="age"
                                                   placeholder="Nhập tuổi">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Gender</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="gender" value="1">
                                                    Male</label>

                                                <label>
                                                    <input type="checkbox" name="gender" value="0">
                                                    Female</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                   placeholder="Nhập số điện thoại">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="user_name">User name</label>
                                            <input type="text" class="form-control" id="user_name" name="user_name"
                                                   placeholder="Nhập tên user">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="active_time">Active time</label>
                                            <input type="text" class="form-control" id="active_time" name="active_time"
                                                   placeholder="Kích hoạt">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="ukey">Ukey</label>
                                            <input type="text" class="form-control" id="ukey" name="ukey"
                                                   placeholder="Nhập ukey">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="exampleInputEmail1">Is Active</label>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="is_active" value="1">On
                                            </label>

                                            <label>
                                                <input type="checkbox" name="is_active" value="0">Off
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="invite_id">Invite</label>
                                            <input type="text" class="form-control" id="invite_id" name="invite_id"
                                                   placeholder="Nhập ID người mời">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="created_user"></label>
                                            <input type="text" class="form-control" id="created_user" name="created_user" hidden
                                                   placeholder="Nhập người lập">
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Lưu lại</button>
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
                let user_name = $('select[name=user_name]').val();
                let age = $('select[name=age]').val();
                let gender = $('select[name=gender]').val();
                let phone = $('select[name=phone]').val();
                let active_time = $('select[name=active_time]').val();
                let ukey = $('select[name=ukey]').val();
                let is_active = $('select[name=is_active]').val();
                let invite_id = $('select[name=invite_id]').val();
                let created_id = $('select[name=created_id]').val();
                let perms = [];
                console.log(is_active);return false;
                $.each($("input[name='perms']:checked"), function() {
                    perms.push($(this).val());
                });
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('user.add') }}",
                    type: "post",
                    dataType: "json",
                    data: {
                        user_name: user_name,
                        full_name: full_name,
                        age: age,
                        gender: gender,
                        phone: phone,
                        active_time: active_time,
                        ukey: ukey,
                        is_active: is_active,
                        invite_id: invite_id,
                        created_id: created_id,
                        perms: perms
                    },
                    success: function(data) {
                        alert('Thêm mới thành công!!!')
                        window.location.href = "{{ route('user_pers.list') }}";
                    }
                });
            });
        });
    </script>
@endsection
