@extends('cms.layouts.masterpage')
@section('title', 'Other Pages')
@section('top-styles')
<link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/forms/switches.css">
<link href="{{ url('') }}/assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/assets/css/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />


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
                        <li class="breadcrumb-item">Site Management</li>
                        <li class="breadcrumb-item active" aria-current="page">Other Pages</li>
                    </ol>
                    <div class="widget-content widget-content-area br-6">
                        <div style="background: black;">
                            <div class="row">
                                <div class="col-md-6 mt15 pl30">
                                    <h5 class="text-white">Other Pages</h5>
                                </div>
                                <!-- @can('User add')
                                    <div class="col-md-6 text-right">
                                        <a href="{{ route('user.create') }}" class="btn btn-danger mb-2 mr-4 ml-3 mt-2">Add User</a>
                                    </div>
                                @endcan -->
                            </div>
                        </div>
                        <br>
                        
                        <table id="datatable" class="table table-bordered table-hover table-condensed mb-4"" width="100%" cellspacing="0"
                            cellpadding="0">
                            <thead class="datatable">
                                <tr>
                                    <th class="no-sort text-center" width="5%">S.No</th>
                                    <th> Name</th>
                                    <th class="no-sort text-center" width="5%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Home</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{route('other_pages.home')}}"  data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>About Us</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{route('other_pages.about_us')}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Our Team</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{route('other_pages.our_team')}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Office Space</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{route('other_pages.office_space')}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Trade License</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{route('other_pages.trade_license')}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Career</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{route('other_pages.career')}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>7.</td>
                                    <td>Blog</td>
                                    <td>
                                        <div class="text-center">
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr> -->
                                <!-- <tr>
                                    <td>8.</td>
                                    <td>Contact</td>
                                    <td>
                                        <div class="text-center">
                                            <a href=""  data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
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
<script src="{{ url('') }}/assets/js/sweetalert2.min.js"></script>
@endsection
@section('bottom-bot-scripts')
    <script>
        $('#datatable').DataTable();
    </script>
@endsection
