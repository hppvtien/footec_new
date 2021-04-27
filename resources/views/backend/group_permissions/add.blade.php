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
                        <h3 class="card-title">Thêm mới Permissions</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <!-- <form  method="post"> -->
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn group</label>
                                <select class="custom-select form-control-border border-width-2" data-placeholder="Chọn Group" name="group_id" id="exampleSelectBorderWidth2">
                                    @foreach($group as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Model name</label>
                                <select name="model_name" data-placeholder="Select a State" style="width: 100%;">
                                    <option value="Alabama">Alabama</option>
                                    <option value="Alaska">Alaska</option>
                                    <option value="California">California</option>
                                    <option value="Delaware">Delaware</option>
                                </select>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Permissions Name</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="perms" value="view">
                                        Xem</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="perms" value="add">
                                        Thêm</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="perms" value="edit">
                                        Sửa</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="perms" value="delete">
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
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>
<script>
    $(document).ready(function() {
        $('#submit').click(function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            let model_name = $('select[name=model_name]').val();
            let group_id = $('select[name=group_id]').val();
            let perms = [];
            $.each($("input[name='perms']:checked"), function() {
                perms.push($(this).val());
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('group_pers.add') }}",
                type: "post",
                dataType: "json",
                data: {
                    model_name: model_name,
                    group_id: group_id,
                    perms: perms
                },
                success: function(data) {
                    alert('Thêm mới thành công!!!')
                    window.location.href = "{{ route('group_pers.list') }}";
                }
            });
        });
    });
</script>
@endsection