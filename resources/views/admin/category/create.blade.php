@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Category</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Category Name</label>
                <input type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Category Level</label>
                <select name="parent_id" class = "form-control" required>
                    <option value="">Select</option>
                    <option value="0"> Main Category </option>
                  </select>
              </div>
              <div class="form-group">
                <label for="inputDescription">Category Description</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
              
              <div class="form-group">
                <label for="exampleInputFile">Category Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" id="exampleInputFile"  class="custom-file-input"  name="category_image">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Featured Category</label>
              </div>

            </div>
            <!-- /.card-body -->
            <div class="col-12" style="margin: 10px">
		          <a href="#" class="btn btn-secondary">Cancel</a>
		          <input type="submit" value="Create new Project" class="btn btn-success float-right">
		        </div>
          </div>
          <!-- /.card -->
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
@endsection