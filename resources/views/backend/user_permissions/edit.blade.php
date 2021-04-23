@extends('backend.layouts.app')
@section('action','Sửa')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa User Permissions - #ID = {{ $user_permissions->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <!-- <form  method="post"> -->
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="user_id">User</label>
                                    <select class="custom-select form-control-border border-width-2"
                                            data-placeholder="Chọn User" name="user_id" id="user_id">
                                        <option value="" disabled>Vui lòng chọn User</option>
                                        <option value="1" {{ $user_permissions->user_id == 1 ? 'selected':'' }}>admin1
                                        </option>
                                        <option value="2" {{ $user_permissions->user_id == 2 ? 'selected':'' }}>admin2
                                        </option>
                                        <option value="3" {{ $user_permissions->user_id == 3 ? 'selected':'' }}>admin3
                                        </option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="model_name">Model name</label>
                                    <select class="custom-select form-control-border border-width-2" name="model_name"
                                            data-placeholder="Chọn model name" style="width: 100%;">
                                        <option
                                            value="Alabama" {{ $user_permissions->model_name == 'Alabama' ? 'selected':'' }}>
                                            Alabama
                                        </option>
                                        <option
                                            value="Alaska" {{ $user_permissions->model_name == 'Alaska' ? 'selected':'' }}>
                                            Alaska
                                        </option>
                                        <option
                                            value="California" {{ $user_permissions->model_name == 'California' ? 'selected':'' }}>
                                            California
                                        </option>
                                        <option
                                            value="Delaware" {{ $user_permissions->model_name == 'Delaware' ? 'selected':'' }}>
                                            Delaware
                                        </option>
                                    </select>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Permissions Name</label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="perms"
                                                   value="view" {{ array_search('view',json_decode($user_permissions->perms,true)) == 0 ? 'checked':'' }}>
                                            Xem</label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="perms"
                                                   value="add" {{ array_search('add',json_decode($user_permissions->perms,true)) == 1 ? 'checked':'' }}>
                                            Thêm</label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="perms"
                                                   value="edit" {{ array_search('edit',json_decode($user_permissions->perms,true)) == 2 ? 'checked':'' }}>
                                            Sửa</label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="perms"
                                                   value="delete" {{ array_search('delete',json_decode($user_permissions->perms,true)) == 3 ? 'checked':'' }}>
                                            Xóa</label>
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
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#submit').click(function () {
                var token = $('meta[name="csrf-token"]').attr('content');
                let model_name = $('select[name=model_name]').val();
                let user_id = $('select[name=user_id]').val();
                let perms = [];
                $.each($("input[name='perms']:checked"), function () {
                    perms.push($(this).val());
                });
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('user_pers.edit',$user_permissions->id) }}",
                    type: "post",
                    dataType: "json",
                    data: {
                        model_name: model_name,
                        user_id: user_id,
                        perms: perms
                    },
                    success: function (data) {
                        alert('Sửa thành công!!!', '-', '{{ $user_permissions->id }}')
                        window.location.href = "{{ route('user_pers.list') }}";
                    }
                });
            });
        });
    </script>
@endsection
