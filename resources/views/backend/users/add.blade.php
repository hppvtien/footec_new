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
                                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Nhập tên user">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập password">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="full_name">Full name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nhập họ tên">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" id="age" name="age" placeholder="Nhập tuổi">
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
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="active_time">Date and time:</label>
                                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="active_time" id="active_time" data-target="#reservationdatetime" />
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
                                            <input type="checkbox" name="is_active" value="1">On
                                        </label>

                                        <label>
                                            <input type="checkbox" name="is_active" value="0">Off
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="ukey">Ukey</label>
                                        <input type="text" class="form-control" id="ukey" name="ukey" placeholder="Nhập ukey">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="invite_id">Invite</label>
                                        <input type="text" class="form-control" id="invite_id" name="invite_id" placeholder="Nhập ID người mời">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="exampleInputEmail1">Permissions</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="perms" value="view">Xem
                                        </label>

                                        <label>
                                            <input type="checkbox" name="perms" value="add">Thêm
                                        </label>
                                        <label>
                                            <input type="checkbox" name="perms" value="edit">Sửa
                                        </label>

                                        <label>
                                            <input type="checkbox" name="perms" value="delete">Xóa
                                        </label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Multiple</label>
                                        <select class="custom-select form-control-border border-width-2" name="groupUser_id" data-placeholder="Chọn model name" style="width: 100%;">
                                            <option value="0" disabled selected>Chọn Group</option>
                                            @foreach($group_user as $key => $item)
                                            <option value="{{ $item->id }}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Groups</label>
                                        <select class="custom-select form-control-border border-width-2" name="group_id" data-placeholder="Chọn model name" style="width: 100%;">
                                            <option value="0" disabled selected>Chọn Group</option>
                                            @foreach($group as $key => $item)
                                            <option value="{{ $item->id }}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="rd_active">
                                            <input type="radio" class="form-check-input" id="rd_active" name="rd_active" checked>Active
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="rd_notactive">
                                            <input type="radio" class="form-check-input" id="rd_notactive" name="rd_active">Not Active
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" id="submit" class="btn btn-primary">Lưu lại</button>
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
            let groupUser_id = $('select[name=groupUser_id]').val();
            let group_id = $('select[name=group_id]').val();
            let rd_active = $('select[name=rd_active]').val();
            let perms = [];
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
                    password: password,
                    full_name: full_name,
                    age: age,
                    gender: gender,
                    phone: phone,
                    active_time: active_time,
                    ukey: ukey,
                    is_active: is_active,
                    invite_id: invite_id,
                    perms: perms,
                    groupUser_id: groupUser_id,
                    group_id: group_id,
                    rd_active: rd_active
                },
                success: function(data) {
                    alert('Thêm mới thành công!!!')
                    window.location.href = "{{ route('user.list') }}";
                }
            });
        });
    });
</script>
@endsection