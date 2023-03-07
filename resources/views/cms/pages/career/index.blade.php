@extends('cms.layouts.masterpage')
@section('title', 'Career')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/forms/switches.css">
    <link href="{{ url('') }}/assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/assets/css/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/components/tabs-accordian/custom-accordions.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 <style>
.error{
    color: red;
}

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
    <div class="overlay">
    </div>
    <div class="cs-overlay">
    </div>
    <div class="search-overlay">
    </div>
    <!--  BEGIN CONTENT AREA  -->   
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item">Site Management</li>
                    <li class="breadcrumb-item"><a href="{{route('other_pages')}}">Other Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Career</li>
                </ol>
                
                
                <form action="{{route('career_page.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="put">

                    <div style="background: black;">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Career</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('other_pages')}}" class="btn btn-danger"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                &nbsp; | &nbsp; Go Back</a>

                                <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>    
                                &nbsp; | &nbsp; Update</button>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-area">
                        <div id="toggleAccordion">
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12 mt10 mb-4">
                                        <textarea cols="10" class="summernote" name="description">{!! $career->description_one !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
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

    <script src="{{ url('') }}/assets/js/components/ui-accordions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
@endsection
@section('bottom-bot-scripts')

    <script>
        $(document).ready(function() {
            $('form').parsley();

            $('.summernote').summernote(
                {
                    height: 300,
                    focus: true
                }
            );

        });

    </script>
@endsection
