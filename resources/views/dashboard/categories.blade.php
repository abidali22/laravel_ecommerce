@extends('layouts.master')

@section('css')
	<style type="text/css">
		nav svg{
			height: 20px;	
		}

		nav .hidden{
			display: block;
		}
	</style>
@endsection

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> All Categories
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
                                <div class="col-md-6">
                                    All Category
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('admin::category.create')}}" class="btn btn-success float-end">Add New Category</a>
                                </div>
                            </div>
                		</div>
                		<div class="card-body">
                			<table class="table table-stripped">
                				<thead>
                					<tr>
                						<th>#</th>
	                					<th>Name</th>
	                					<th>Slug</th>
	                					<th>Action</th>
                					</tr>
                				</thead>
            				<?php $i = ($categories->currentPage()-1)*$categories->perPage(); ?>
                				<tbody>
                					@foreach($categories as $category)
                					<tr>
                						<td>{{++$i}}</td>
                						<td>{{$category->name}}</td>
                						<td>{{$category->slug}}</td>
                						<td>
                                            <a href="{{route('admin::category.edit',[$category->id])}}" class="text-info">Edit</a>
                                            <a href="#" style="margin-left: 20px;" onclick="deleteConfirmation({{$category->id}})">Delete</a>
                                        </td>
                					</tr>
                					@endforeach
                				</tbody>
                			</table>
                			{{$categories->links()}}
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bp-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Do you want to Delete this Record?</h4>
                        {!! Form::hidden('hide_val', null, array('id'=>'hidCatId')) !!}
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="deleteCategory()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        function deleteConfirmation(id) {
            $('#deleteConfirmation').modal('show');
            $('#hidCatId').val(id);
        }

        function deleteCategory() {
            var catId = $('#hidCatId').val();
            $.ajax({
                url: '/admin/category/'+catId,
                type: 'DELETE',
                dataType: 'JSON',
                async: false,
                success: function () {
                  console.log('good job abid');
                  // $(".shopping-summery").load(location.href + " .shopping-summery");
                  // $(".cart-totals").load(location.href + " .cart-totals");
                  // $("#shortdropdown").load(location.href + " #shortdropdown");
                  // $('.alert-success').remove();
              }
            });
            $('#deleteConfirmation').modal('hide');
        }

    </script>
@endsection