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
          <form action="{{ route('group_pers.add') }}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Chọn group</label>
                <select class="custom-select form-control-border border-width-2" name="group_id" id="exampleSelectBorderWidth2">
                  <option>Vui lòng chọn group</option>
                  @foreach($group as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Model Name</label>
                <input type="text" class="form-control" name="model_name" id="model_name" placeholder="Model name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Permissions Name</label>
                <input type="checkbox" class="form-control" name="perms" id="perms" placeholder="Permissions name">
              </div>
              <div class="panel-body">
                
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