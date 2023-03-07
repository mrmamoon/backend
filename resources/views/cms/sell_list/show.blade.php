@extends('cms.layouts.masterpage')
@section('title', 'Vehicles')
@section('top-styles')
<link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/forms/switches.css">
<link href="{{ url('') }}/assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/assets/css/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />


<style>
.widget-content-area {
    padding: 0px;
}
thead.datatable {
    background: #0e1726;
}
.table > thead > tr > th {
    color: #ffffff;
}
</style>
@endsection
@section('header')
    @parent
@endsection
@section('leftside')
    @parent
@endsection
@section('content')
<!--  BEGIN MAIN CONTAINER  -->
    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content ">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <!-- <li class="breadcrumb-item"> All Vehicles </li> -->
                        <li class="breadcrumb-item active" aria-current="page">Sell List Show</li>
                    </ol>
                    <div class="widget-content widget-content-area br-6">
                        <!-- <div style="background-color: #282a33;">
                            <div class="row">
                                <div class="col-md-6 mt15 pl30">
                                    <h5 class="text-white">sell</h5>
                                </div>
                                    <div class="col-md-6 text-right">
                                        <a href="{{ route('developer.create') }}" class="btn btn-danger mb-2 mr-4 ml-3 mt-2">Add Project</a>
                                    </div>
                            </div>
                        </div> -->
                        <br>
                        <div class="container-fluid">
                        	<div class="row">
                        		<div class="form-group col-md-3">
                                    <label for="">Full Name</label>
                                    <h5 class=""><b>{!! $sell->name !!}</b></h5>
                            	</div>

	                            <div class="form-group col-md-3">
	                                <label for="">Email</label>
	                                <h5 class=""><b>{!! $sell->email !!}</b></h5>
	                            </div>

	                            <div class="form-group col-md-3">
	                                <label for="">Number</label>
	                                <h5 class=""><b>{!! $sell->number !!}</b></h5>
	                            </div>

	                            <div class="form-group col-md-3">
	                                <label for="">Location</label>
	                                <h5 class=""><b>{!! $sell->url !!}</b></h5>
	                            </div>

	                            <div class="form-group col-md-2">
                                    <label for="">Type</label>
                                    <h5 class=""><b>{!! $sell->type !!}</b></h5>
                            	</div>

	                            <div class="form-group col-md-2">
	                                <label for="">Bedrooms</label>
	                                <h5 class=""><b>{!! $sell->bedrooms !!}</b></h5>
	                            </div>

	                            <div class="form-group col-md-2">
	                                <label for="">Area</label>
	                                <h5 class=""><b>{!! $sell->area !!}</b></h5>
	                            </div>

	                            <div class="form-group col-md-3">
	                                <label for="">Unit No</label>
	                                <h5 class=""><b>{!! $sell->unitno !!}</b></h5>
	                            </div>

	                            <div class="form-group col-md-3">
                                    <label for="">Price</label>
                                    <h5 class=""><b>{!! $sell->price !!}</b></h5>
                            	</div>
                            </div>
                            <hr>

                            <div class="row">
                            	<div class="col-6">
                            		<label for="">Title Image</label>
                            		<div>
                            			<img src="{{config('fgproperties_cms.file_path').$sell->title_image}}" style="width:80%; border: 1px solid; border-color: red;" />
                            		</div>
                                        <a href="{{config('fgproperties_cms.file_path').$sell->title_image}}" download class="btn btn-danger mb-2 mr-4 ml-3 mt-2 float-right">Download</a>
                            	</div>
                            	<div class="col-6">
                            		<label for="">Passport Image</label>                                        
                            		<div>
                            			<img src="{{config('fgproperties_cms.file_path').$sell->passport_image}}" style="width:80%; border: 1px solid; border-color: red;" />
                            		</div>
                                    <a href="{{config('fgproperties_cms.file_path').$sell->passport_image}}" download class="btn btn-danger mb-2 mr-4 ml-3 mt-2 float-right">Download</a>
                            	</div>
                            </div>

                            <hr>
                            <br>

                            <div class="row">

                            	 @php
                                    if ($sell->images !="") {
                                    $images = $sell->images;
                                    $img3 = explode(',', $images);
                                    foreach($img3 as $images){
                                        if($images != '')
                                        {
                                    @endphp
                            	<div class="col-3">
                            		<label for="">Multiple Images</label>
                            		<img src="{{config('fgproperties_cms.file_path').$images}}" style="width:100%; border: 1px solid; border-color: red;" />
                                    <a href="{{config('fgproperties_cms.file_path').$images}}" download class="btn btn-danger mb-2 mr-4 ml-3 mt-2 float-right">Download</a>
                            	</div>
                            	@php 
                              }
                                    }
                                } 
                                    @endphp
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('bottom-mid-scripts')
<!-- Required datatable js -->
<script src="{{ url('') }}/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/assets/js/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('') }}/assets/js/datatables/axios.min.js"></script>
@endsection
@section('bottom-bot-scripts')
@endsection