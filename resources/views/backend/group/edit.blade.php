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
            <h3 class="card-title">Sửa</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('group.edit',$group->id) }}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên Nhóm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Nhập tên nhóm" value="{!! old('name', isset($group->name) ? $group->name : null) !!}">
              </div>
              <div class="form-check">
                <label class="custom-checkbox">
                  <input type="checkbox" name="is_active" value="{{ $group->is_active }}" {{ $group->is_active == 1 ? 'checked':'' }}> Hiển thị
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