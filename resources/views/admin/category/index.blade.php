@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <table id="category_table" class="table table-bordered table-striped">
			              <thead>
			                  <tr>
			                    <th>Category Name</th>
			                    <th>Category Image</th>
			                    <th>Action</th>
			                  </tr>
			              </thead>
		                 <tbody>  
		                      @foreach($data['all_records'] as $row)    
		                     <tr>            
		                        <td> 
		                         @if($row->level == 0) <b>  @endif 
		                         @if($row->level == 1) &nbsp; - @endif   
		                         @if($row->level == 2) &nbsp; &nbsp; - - @endif     
		                         @if($row->level == 3) &nbsp; &nbsp; &nbsp; - - - @endif       
		                         @if($row->level == 4) &nbsp; &nbsp; &nbsp; &nbsp; - - - - @endif       
		                         @if($row->level == 5) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  - - - - - @endif       
		                         @if($row->level > 5)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - - - @endif
		                         
		                         {{ $row->category_name }} 
		                         @if($row->level == 0) </b>  @endif 
		                         </td> 
		                        <td align="center">
		                        	@if($row->category_image != null)
		                        	<img src="{{ asset('uploads/category/thumbnail').'/'.$row->category_image }}" alt="" width="80px">
		                        	@else
		                        	<img src="{{ asset('uploads/category/no_category.png') }}" alt="" width="50px" height="50px">
		                        	@endif
		                        </td>
		                        <td>
                              @can('category-edit')
		                          <button onclick="window.location='{{ url('/')}}/admin/category/{{$row->category_row_id}}/edit'" class="btn btn-warning mb-2">Edit</button>
		                          @endcan
                              @can('category-delete')
		                          <form id="deleteCategory_{{$row->category_row_id}}" action="{{ url('/')}}/admin/category/{{$row->category_row_id}}" style="display: inline;" method="POST">
		                          	{{ method_field('DELETE') }}
            						        @csrf
		                          	<input class="btn btn-danger deleteLink" category_name="{{ $row->category_name }}" category_row_id="{{$row->category_row_id}}" data-toggle="modal" data-target="#category-delete-modal" deleteID="{{$row->category_row_id}}" value="Delete" style="width: 100px;">
		                          </form>
                              @endcan
		                        </td>                        
		                      </tr>
		                    @endforeach
		                </tbody>
		            </table>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection