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
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- form start -->
              <form role="form" method="post" action="{{ url('admin/articles/update/'.$data['id']) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputText">Category</label>
                    <select class="custom-select" name="category_id" required>
                      <option value="">== Please Select Category ==</option>
                      @foreach($category as $key)
                      <option value="{{$key['category_id']}}" @if($data['category_id']==$key['category_id']) selected @endif>{{$key['category_name']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText">Title</label>
                    <input type="text" required name="title" value="{{$data['title']}}" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" class="form-control" id="exampleInputText" placeholder="Enter title ..">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{$data['slug']}}"  id="slug-text" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText">Logo</label>
                      <div class="col-md-9">
                        <div class="input-group-append">
                          <input type="file"  name="images" id="imgInp" >
                          <img id="blah" src="{{$data['banner_url']}}" alt="your image" width="100px" height="100px" />
                        </div>
                      <small>size max upload image 5Mb.</small>
                      </div>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputText">Content</label>
                    <textarea class="form-control" name="content" rows="5" required>{{$data['content']}}</textarea>                    
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
function convertToSlug (str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
  
    // remove accents, swap ñ for n, etc
    var from = "àáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaaeeeeiiiioooouuuunc------";

    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    
  document.getElementById("slug-text").value= str;
}
</script>

