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
            <h3 class="card-title">Thêm mới Admin</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('admins.add') }}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="user_name">User name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Nhập tên user">
              </div>
              <div class="form-group">
                <label for="full_name">Full name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nhập họ tên đầy đủ">
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