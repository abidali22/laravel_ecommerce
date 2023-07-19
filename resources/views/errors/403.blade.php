@extends('layouts.errors')

@section('title')
    @parent |  Permission Denied!
@stop

@section('errorCode', "403")

@section('message')
<div class="right_col" role="main">
	<div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
          	<h1 align="center" style="color:red;">Permission Denied!</h1>  
          	<div align="center" style="color: white; font-size: 20px;">Sorry! You don't have a permission to view this page! <br>To view this page, please contact with admin for further action.</div>
          </div>
        </div>
      </div>
	</div>
</div>      
@stop
