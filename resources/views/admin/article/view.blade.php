@extends('admin.template.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            @if($errors->any())
              <div class="alert alert-danger">
              {{$errors->first()}}
              </div>
            @endif
            @if(session()->has('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
          @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data</h3><br><br>
                <a class="btn btn-success btn-sm" href="{{ url('/admin/articles/add')}}"><i class="fa fa-plus"></i> Add New</a>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Banner</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($data as $key)
                  <tr>
                    <td><img src="{{$key['banner_small_url']}}" width="50px" height="50px"></td>
                    <td>{{$key['category']['category_name']}}</td>
                    <td>{{$key['title']}}</td>
                    <td>{{$key['slug']}}</td>
                    <td>
                    <a class="btn btn-warning" href='{{ url('/admin/articles/edit')}}/{{$key['id'] }}')"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" href='{{ url('/admin/articles/delete')}}/{{$key['id'] }}')"><i class="fa fa-trash"></i></button></td>
                  </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Banner</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

