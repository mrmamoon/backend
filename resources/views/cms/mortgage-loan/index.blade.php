@extends('cms.layouts.masterpage')
@section('title', 'Blogs')
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
                        <li class="breadcrumb-item active" aria-current="page">Mortgage Applicants</li>
                    </ol>
                    <div class="widget-content widget-content-area br-6">
                        <div style="background: #294159;">
                            <div class="row">
                                <div class="col-md-6 mt15 pl30">
                                    <h5 class="text-white">Mortgage Applicants</h5>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <table id="datatable" class="table table-bordered table-hover table-condensed mb-4" width="100%" cellspacing="0"
                            cellpadding="0">
                            <thead class="datatable">
                                <tr>
                                    <th class="no-sort text-center" width="5%">S.No</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Monthly Installment</th>
                                    <th>Loan Amount</th>
                                    <th>Loan Period</th>
                                    <th>Down Payment</th>
                                    <th>Interest Rate</th>
                                    <th>Property price</th>
                                    @if(auth()->user()->can('Mortgage Applicants-approve'))
                                    <th>Approve</th>
                                    @endif
                                    <!-- <th class="no-sort text-center" width="8%">Actions</th> -->
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
@include('cms.mortgage-loan.includes.mortgage-loan-js')
@endsection
