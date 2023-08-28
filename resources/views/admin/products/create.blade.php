@extends('admin.layouts.app')

@section('content')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
<!-- CodeMirror -->
<link rel="stylesheet" href="{{ asset('plugins/codemirror/codemirror.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/codemirror/theme/monokai.css') }}">
<!-- SimpleMDE -->
<link rel="stylesheet" href="{{ asset('plugins/simplemde/simplemde.min.css') }}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form role="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <section class="content" style="padding: 10px;">
          <div class="row">
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Product Basic Information</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" placeholder="Enter product title" name="product_name">
                  </div>
                  <div class="form-group">
                    <label>Product Short Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter short description"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Product Detail Description</label>
                    <textarea id="summernote">
                      Place <em>some</em> <u>text</u> <strong>here</strong>
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Product Main Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="exampleInputFile"  class="custom-file-input"  name="product_image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- /.card -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Product Links</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputStatus">Category Level</label>
                    <select name="parent_id" class = "form-control" required>
                        <option value="">Select</option>
                        @foreach($all_categories as $row)
                            <option value="{{ $row->category_row_id}}">
                              @if($row->level == 0) <b>  @endif 
                              @if($row->level == 1) &nbsp; - @endif   
                              @if($row->level == 2) &nbsp; &nbsp; - - @endif     
                              @if($row->level == 3) &nbsp; &nbsp; &nbsp; - - - @endif       
                              @if($row->level == 4) &nbsp; &nbsp; &nbsp; &nbsp; - - - - @endif       
                              @if($row->level == 5) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  - - - - - @endif       
                              @if($row->level > 5)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - - - @endif
                              {{ $row->category_name }} 
                              @if($row->level == 0) </b>  @endif  
                            </option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Brand/Manufacturer</label>
                    <select name="brand_id" class = "form-control" required>
                        <option value="">Select</option>
                    </select>
                  </div>

                </div>
              <!-- /.card -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Product Price, SKU & Stock Information</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                </div>
              <!-- /.card -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Product Inventory/Variations</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                </div>
              <!-- /.card -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Product Additional Gallery Images</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                </div>
              <!-- /.card -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Products Additional Information</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                </div>
              <!-- /.card -->
              </div>
            </div>
          </div>
        </section>
    </form>
    <!-- /.content -->
  </div>

  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- CodeMirror -->
  <script src="{{ asset('plugins/codemirror/codemirror.js') }}"></script>
  <script src="{{ asset('plugins/codemirror/mode/css/css.js') }}"></script>
  <script src="{{ asset('plugins/codemirror/mode/xml/xml.js') }}"></script>
  <script src="{{ asset('plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
      $('.alert-danger').delay(3000).fadeOut('slow');
    });
  </script>
@endsection