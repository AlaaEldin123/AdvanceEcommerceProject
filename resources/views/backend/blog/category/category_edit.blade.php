@extends('admin.admin_master')
@section('admin')

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		


<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Blog Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					   <form method="post" action="{{ route('blogcategory.update') }}" >
	 	@csrf
					  <input type="hidden" value="{{$blogcategory->id}}" name="id"> 

	 <div class="form-group">
		<h5>Blog Category Name English  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" value="{{$blogcategory->blog_category_name_en}}" name="blog_category_name_en" class="form-control" > 
	 @error('blog_category_name_en') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>


	<div class="form-group">
		<h5>Blog Category Name Arabic <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" value="{{$blogcategory->blog_category_name_ar}}" name="blog_category_name_ar" class="form-control" >
     @error('blog_category_name_ar') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>



					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
						</div>
					</form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			 
			 
			  <!-- /.box -->          
			</div>



 <!-- Add Category Page --> 







			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>



	  @endsection