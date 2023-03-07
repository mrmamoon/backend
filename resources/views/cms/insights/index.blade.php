@extends('cms.layouts.masterpage')
@section('title', 'Vehicles')
@section('top-styles')
<link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/forms/switches.css">
<link href="{{ url('') }}/assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/assets/css/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.5.1.js">
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
                        <li class="breadcrumb-item active" aria-current="page">Insights</li>
                    </ol>
                    <div class="widget-content widget-content-area br-6">
                        <div style="background-color: #294159;">
                            <div class="row">
                                <div class="col-md-6 mt15 pl30">
                                    <h5 class="text-white">Property Price Per Sqft</h5>
                                </div>
                                @can('insights-add')
                                    <div class="col-md-6 text-right">
                                        <!-- <a href="{{ route('insight.create_property_Price_Per_Sqft') }}" class="btn btn-danger mb-2 mr-4 ml-3 mt-2">Add Property Price Per Sqft</a> -->
                                        <a href="{{ route('insight.create_property_Price_Per_Sqft') }}" class="btn btn-danger mb-2 mr-4 ml-3 mt-2">Upload Insights Data</a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <br>

                        @if(session()->has('message'))
                            <div>
                                <span >{{ session()->get('message') }}</span>
                            </div>
                        @endif
                       
                        <table id="datatable_property_Price_Per_Sqft" class="table table-bordered table-hover table-condensed mb-4" width="100%" cellspacing="0"
                            cellpadding="0">
                            <thead class="datatable">
                                <tr>
                                    <th class="no-sort text-center" width="5%">S.No</th>
                                    <th>Year</th>
                                    <th>January</th>
                                    <th>February</th>
                                    <th>March</th>
                                    <th>April</th>
                                    <th>May</th>
                                    <th>June</th>
                                    <th>July</th>
                                    <th>August</th>
                                    <th>September</th>
                                    <th>October</th>
                                    <th>November</th>
                                    <th>December</th>
                                </tr>
                            </thead>
                        </table>
                        <br>
                    </div>
                    <br>

                    <div class="widget-content widget-content-area br-6">
                        <div style="background-color: #294159;">
                            <div class="row">
                                <div class="col-md-6 mt15 pl30">
                                    <h5 class="text-white">Monthly Property Sales Value</h5>
                                </div>
                                @can('insights-add')
                                    <!-- <div class="col-md-6 text-right">
                                        <a href="{{ route('insight.create_property_Price_Per_Sqft') }}" class="btn btn-danger mb-2 mr-4 ml-3 mt-2">Add Monthly Property Sales Value</a>
                                    </div> -->
                                @endcan

                            </div>
                        </div>
                        <br>
                        
                        <table id="datatable_monthly_property_sales_value" class="table table-bordered table-hover table-condensed mb-4 display nowrap" style="width:100%" width="100%" cellspacing="0"
                            cellpadding="0">
                            <thead class="datatable">
                                <tr>
                                    <th class="no-sort text-center" width="5%">S.No</th>
                                    <th>Year</th>
                                    <th>January</th>
                                    <th>February</th>
                                    <th>March</th>
                                    <th>April</th>
                                    <th>May</th>
                                    <th>June</th>
                                    <th>July</th>
                                    <th>August</th>
                                    <th>September</th>
                                    <th>October</th>
                                    <th>November</th>
                                    <th>December</th>
                                </tr>
                            </thead>
                        </table>
                        <br>
                    </div>
                    <br>

                    <div class="widget-content widget-content-area br-6">
                        <div style="background-color: #294159;">
                            <div class="row">
                                <div class="col-md-6 mt15 pl30">
                                    <h5 class="text-white">Top 5 Performing Areas 2022 (YTD)</h5>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <table id="datatable_top_performing_areas" class="table table-bordered table-hover table-condensed mb-4" width="100%" cellspacing="0"
                            cellpadding="0">
                            <thead class="datatable">
                                <tr>
                                    <th class="no-sort text-center" width="5%">S.No</th>
                                    <th>Area Name</th>
                                    <th>Popularity</th>
                                </tr>
                            </thead>
                        </table>
                        <br>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection
@section('bottom-mid-scripts')
<!-- Required datatable js -->
<script src="{{ url('') }}/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/assets/js/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('') }}/assets/js/datatables/axios.min.js"></script>
@endsection
@section('bottom-bot-scripts')
@include('cms.insights.includes.propertyPricePerSqft-js')
@include('cms.insights.includes.propertySalesValue-js')
@include('cms.insights.includes.topPerformingAreas-js')
@endsection
