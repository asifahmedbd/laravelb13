@extends('admin.layouts.app')

@section('content')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
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

                  <div class="form-group">
                    <label for="productName">Tags</label>
                    <input type="text" class="form-control" id="productName" placeholder="Enter tags" name="product_tags">
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
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="modelName">Model/Code</label>
                        <input type="text" class="form-control" id="modelName" placeholder="Enter product model" name="model_name">
                      </div>
                    </div>
                    <div class="col-md-3">
                       <div class="form-group">
                        <label for="productSKU">SKU</label>
                        <input type="text" class="form-control" id="productSKU" placeholder="Enter product SKU" name="product_sku">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity" placeholder="Enter stock quantity" name="product_quantity">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Unit</label>
                        <select class="form-control">
                          <option value="">Select Unit</option>
                          <option value="gm">gm</option>
                          <option value="kg">kg</option>
                          <option value="pcs">pcs</option>
                          <option value="ml">ml</option>
                          <option value="ltr">ltr</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="number" class="form-control" id="productPrice" placeholder="Enter price" name="product_sell_price">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="offerPrice">Discount/Offer Price</label>
                        <input type="number" class="form-control" id="offerPrice" placeholder="Enter discount" name="product_offer_price">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Percent or Fixed</label>
                        <select class="form-control">
                          <option value="">Discount Type</option>
                          <option value="1">Percent %</option>
                          <option value="2">Fixed</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                      <label>Discount Date Range:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation" name="datefilter">
                      </div>
                    </div>
                    </div>
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
                  <h3 class="card-title">Product Inventory/Variations</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <input class="inventory_on_off" type="checkbox" name="my-checkbox" data-bootstrap-switch data-off-color="danger" data-on-color="success">

                  <div class="atr-wrapper" style="display: none; margin-top: 10px;">
                      @foreach($all_attributes as $adata)
                        @php
                          $aid = $adata->attribute_row_id; 
                          $atr_value = json_decode($adata->attribute_value, true);
                          $atr_count = count(json_decode($adata->attribute_value, true));
                        @endphp
                        <div class="single-atr">
                            <div class="icheck-primary d-inline">
                                <input class="variation_type" type="checkbox" id="checkboxPrimary_{{ $aid }}" atr_id="{{ $aid }}" atr_count="{{ $atr_count }}" atr_name="{{ $adata->attribute_name }}">
                                <label for="checkboxPrimary_{{ $aid }}"><span class="main_label">{{ $adata->attribute_name }}</span></label>
                              </div>
                            @foreach($atr_value as $key => $atrdata)
                              <div class="icheck-primary d-inline variation_values_{{ $aid }}">
                                <input class="attribute_data" type="checkbox" id="checkboxPrimary_{{ $aid }}_{{ $key }}" atr_data="{{ $atrdata }}" parent_atr_title="{{ $adata->attribute_name }}">
                                <label for="checkboxPrimary_{{ $aid }}_{{ $key }}"><span>{{ $atrdata }}</span></label>
                              </div>
                            @endforeach
                        </div>
                      @endforeach
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
                  <h3 class="card-title">Product Additional Gallery Images</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">Product Gallery Images</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="exampleInputFile"  class="custom-file-input"  name="product_images" multiple="multiple">
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
                  <div class="form-group">
                    <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i> Product Collection</label>
                  </div>
                  <div class="form-group">
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary1">
                        <label for="checkboxPrimary1">Featured Product</label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary1">
                        <label for="checkboxPrimary1">Top Selling Product</label>
                      </div>
                    </div>
                  </div>
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
  <!-- Bootstrap Switch -->
  <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
  <!-- date-range-picker -->
  <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script type="text/javascript">

    $(document).ready(function(){
      // Summernote
      $('#summernote').summernote();
      //Date range picker
      $('input[name="datefilter"]').daterangepicker({
          autoUpdateInput: false,
          locale: {
              cancelLabel: 'Clear'
          }
      });

      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      });

      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });



      $('.alert-danger').delay(3000).fadeOut('slow');
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });

      $('body').on('switchChange.bootstrapSwitch','.inventory_on_off',function () {
         if($(this).is(':checked')){
            //console.log('on');
            $('.atr-wrapper').delay(200).fadeIn();
          } else {
            //console.log('off');
            $('.atr-wrapper').delay(200).fadeOut();
          }
      });

       var main_attributes = {};
      $('.variation_type').click(function(){
        if($(this).is(':checked')){
           var atr_id = $(this).attr('atr_id');
           var atr_count = $(this).attr('atr_count');
           var atr_name = $(this).attr('atr_name');

           for (var i = 0; i < atr_count; i++) {
              $('#checkboxPrimary_'+atr_id+'_'+i).prop('checked', true);
           }

        } else {
           var atr_id = $(this).attr('atr_id');
           var atr_count = $(this).attr('atr_count');
           for (var i = 0; i < atr_count; i++) {
              $('#checkboxPrimary_'+atr_id+'_'+i).prop('checked', false);
           }
        }
      });

      $('.attribute_data').click(function(){
         
          if($(this).is(':checked')){
            var parent_atr_title = $(this).attr('parent_atr_title').toLowerCase();
            var variation_title = $(this).attr('atr_data');
            
            if(!main_attributes[parent_atr_title]){
              main_attributes[parent_atr_title] = [];
              var combinations = [];
              main_attributes[parent_atr_title].push(variation_title);
              
            } else {
              main_attributes[parent_atr_title].push(variation_title);
              
            }
          }
      });

    });
  </script>
@endsection