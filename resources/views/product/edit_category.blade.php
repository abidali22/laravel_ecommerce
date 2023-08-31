@extends('layouts.master')

@section('title')
  @parent | Edit Category
@stop

@section('content')
  <main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span></span>Edit Category <span></span> ({{$categoryRow->name}})
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
                                <div class="col-md-6">Edit Category</div>
                                <div class="col-md-6">
                                    <a href="{{route('admin::category.index')}}" class="btn btn-primary float-end">All Categories</a>
                                </div>
                            </div>
                            
                		</div>
                		<div class="card-body">
                            {!! Form::open(['method' => 'PUT', 'route' => ['admin::category.update', $categoryRow->id]]) !!}
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" onkeyup="changeSlug()" value="{{$categoryRow->name}}" placeholder="Enter Category Name">
                                    @error('name')
                                        <p class='text-danger'>{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Slug</label>
                                    <input type="text" name="slug" value="{{$categoryRow->slug}}" class="form-control" id="slug" placeholder="Enter Category Slug">
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