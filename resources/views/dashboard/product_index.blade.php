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
                <a href="{{route('home')}}" rel="nofollow">Home</a>
                <span></span> All Products
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
                                    All Products
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('admin::category.create')}}" class="btn btn-success float-end">Add New Product</a>
                                </div>
                            </div>
                		</div>
                		<div class="card-body">
                			<table class="table table-stripped dtable" id="ptable">
                				<thead>
                					<tr>
                						<th>#</th>
	                					<th>Image</th>
                                        <th>Name</th>
	                					<th>Stock</th>
	                					<th>Price</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Action</th>
                					</tr>
                				</thead>
            		      		<?php $i = ($products->currentPage()-1) * $products->perPage(); ?>
                				<tbody>
                					@foreach($products as $product)
                					<tr id='{{$product->id}}'>
                						<td>{{++$i}}</td>
                                        <td><img src="{{ asset('assets/imgs/shop/product-')}}{{$product->id}}-1.jpg" alt="{{++$i}}" width="60px"></td>
                						<td>{{$product->name}}</td>
                						<td>{{$product->stock_status}}</td>
                						<td>{{$product->regular_price}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td></td>
                					</tr>
                					@endforeach
                				</tbody>
                			</table>
                			{{$products->links()}}
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection