@extends('layouts.master')

@section('title')
  @parent | Add Category
@stop

@section('content')
  <main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span></span> Add New Categories
            </div>
        </div>
    </div>

    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                	<div class="card">
                		<div class="card-header">
                			<div class="row">
                                <div class="col-md-6">Add New Categories</div>
                                <div class="col-md-6">
                                    <a href="{{route('admin::category.index')}}" class="btn btn-primary float-end">All Categories</a>
                                </div>
                            </div>
                            
                		</div>
                		<div class="card-body">
                            {!! Form::open(["data-parsley-validate"=> "data-parsley-validate", 'method' => 'POST','route' => 'admin::category.store']) !!}
                            {{-- !! Form::hidden('gst_permission', null, array('id'=>'gstPermission')) !!}
                            {!! Form::hidden('disc_permission', null, array('id'=>'discPermission')) !!--}}
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" onkeyup="changeSlug()" placeholder="Enter Category Name">
                                    @error('name')
                                        <p class='text-danger'>{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter Category Slug">
                                    @error('slug')
                                        <p class='text-danger'>{{$message}}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            {!! Form::close() !!}
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('js')
    <script type="text/javascript">
        function changeSlug() {
            var categoryName = $('#name').val();
            categoryName = categoryName.replace(/\s+/g, '-').toLowerCase();
            $('#slug').val(categoryName);
        }

    </script>
@endsection