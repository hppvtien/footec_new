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
            <h3 class="card-title">Thêm mới Group</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('group.add') }}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Nhóm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Nhập tên nhóm">
              </div>
              <div class="form-check">
                <label class="custom-checkbox">
                  <input type="checkbox" name="is_active" value="1" checked=""> Hiển thị
                </label>

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
@endsection