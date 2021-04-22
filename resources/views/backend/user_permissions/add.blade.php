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
            <h3 class="card-title">Thêm mới User Permissions</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form>
            <!-- <form  method="post"> -->
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="user_id">User</label>
                <select class="custom-select form-control-border border-width-2" data-placeholder="Chọn User" name="user_id" id="user_id">
                  <option value="" disabled selected>Vui lòng chọn User</option>
                  <option value="1">admin1</option>
                  <option value="2">admin2</option>
                  <option value="3">admin3</option>
                </select>

              </div>
              <div class="form-group">
                <label for="model_name">Model name</label>
                <select class="custom-select form-control-border border-width-2" name="model_name" id="model_name" data-placeholder="Select a State" style="width: 100%;">
                  <option value="" disabled selected>Vui lòng chọn Model</option>
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
      let user_id = $('select[name=user_id]').val();
      let perms = [];
      $.each($("input[name='perms']:checked"), function() {
        perms.push($(this).val());
      });
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('user_pers.add') }}",
        type: "post",
        dataType: "json",
        data: {
          model_name: model_name,
          user_id: user_id,
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