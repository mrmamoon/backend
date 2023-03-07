@extends('cms.layouts.masterpage')
@section('title', 'Office Space')
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

.bg-image {
  visibility: hidden;
  position: absolute;
}

.sign-image {
  visibility: hidden;
  position: absolute;
}

.section-four-image {
  visibility: hidden;
  position: absolute;
}

.section-five-image {
  visibility: hidden;
  position: absolute;
}

.img-thumbnail{
    cursor: pointer;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}

.images {
    display: flex;
    flex-wrap: wrap;
}

.photo {
    width: 100%;
    height: 450px;
}

.photo img {
    width: 100%;
    height: 100%;
}

.images-sign {
    display: flex;
    flex-wrap: wrap;
}

.photo-sign {
    width: 250px;
    height: 100px;
}

.photo-sign img {
    width: 100%;
    height: 100%;
}

.section-four-image {
    display: flex;
    flex-wrap: wrap;
}

.section-four-photo {
    width: 1580px;
    height: 400px;
}

.section-four-photo img {
    width: 100%;
    height: 100%;
}

.section-five-image {
    display: flex;
    flex-wrap: wrap;
}

.section-five-photo {
    width: 420px;
    height: 280px;
}

.section-five-photo img {
    width: 100%;
    height: 100%;
}

.img-thumbnail:hover {
  box-shadow: 0 0 2px 1px #000;
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
                    <li class="breadcrumb-item active" aria-current="page">Office Space</li>
                </ol>
                
                
                    
                    <div style="background: black;">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Office Space</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('other_pages')}}" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> 
                                    <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg> &nbsp; | &nbsp; Go Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        

                        <div id="toggleAccordion">
                            <br>
                            <!-- Section One -->
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="card">
                                        <div class="card-header" id="...">
                                            <section class="mb-0 mt-0">
                                                <div role="menu" class="collapsed" data-toggle="collapse" data-target="#sectionOne" aria-expanded="true" aria-controls="sectionOne">
                                                    Section One  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                </div>
                                            </section>
                                        </div>

                                        <div id="sectionOne" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                                            <br>
                                            <table id="officeSpaceSectionOneDatatable" class="table table-bordered table-hover table-condensed mb-4"" width="100%" cellspacing="0"
                                            cellpadding="0">
                                                <thead class="datatable">
                                                    <tr>
                                                        <th class="no-sort text-center" width="5%">S.No</th>
                                                        <th>Image</th>
                                                        <th class="no-sort text-center" width="5%">Actions</th>
                                                        <th class="no-sort text-center" width="5%">Status</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{route('office_space_section_one.create')}}" class="btn btn-dark mb-2 ml-1 mr-4 mt-2"> Add</a>
                                </div>
                            </div>
                            <!-- End Section One -->

                            <!-- Section Two -->
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="card">
                                        <div class="card-header" id="...">
                                            <section class="mb-0 mt-0">
                                                <div role="menu" class="collapsed" data-toggle="collapse" data-target="#sectionTwo" aria-expanded="true" aria-controls="sectionTwo">
                                                    Section Two  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                </div>
                                            </section>
                                        </div>

                                        <div id="sectionTwo" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                                            <br>
                                            <table id="officeSpaceSectionTwoDatatable" class="table table-bordered table-hover table-condensed mb-4"" width="100%" cellspacing="0"
                                            cellpadding="0">
                                                <thead class="datatable">
                                                    <tr>
                                                        <th class="no-sort text-center" width="5%">S.No</th>
                                                        <th>Category Name</th>
                                                        <th class="no-sort text-center" width="5%">Actions</th>
                                                        <th class="no-sort text-center" width="5%">Status</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{route('office_space_section_two.create')}}" class="btn btn-dark mb-2 ml-1 mr-4 mt-2"> Add</a>
                                </div>
                            </div>
                            <!-- End Section Two -->

                            <!-- Section Three -->
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="card">
                                        <div class="card-header" id="...">
                                            <section class="mb-0 mt-0">
                                                <div role="menu" class="collapsed" data-toggle="collapse" data-target="#sectionThree" aria-expanded="true" aria-controls="sectionThree">
                                                    Section Three  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                                </div>
                                            </section>
                                        </div>

                                        <div id="sectionThree" class="collapse" aria-labelledby="..." data-parent="#toggleAccordion">
                                            <br>
                                            <table id="officeSpaceSectionThreeDatatable" class="table table-bordered table-hover table-condensed mb-4"" width="100%" cellspacing="0"
                                            cellpadding="0">
                                                <thead class="datatable">
                                                    <tr>
                                                        <th class="no-sort text-center" width="5%">S.No</th>
                                                        <th>Category</th>
                                                        <th>Image</th>
                                                        <th class="no-sort text-center" width="5%">Actions</th>
                                                        <th class="no-sort text-center" width="5%">Status</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{route('office_space_section_three.create')}}" class="btn btn-dark mb-2 ml-1 mr-4 mt-2"> Add</a>
                                </div>
                            </div>
                            <!-- End Section Three -->

                        </div>
                    </div>
                
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

@include('cms.pages.office_space.section_one.includes.office-space-section-one-js')
@include('cms.pages.office_space.section_two.includes.office-space-section-two-js')
@include('cms.pages.office_space.section_three.includes.office-space-section-three-js')
    <script>
        $(document).ready(function() {
            $('form').parsley();

            $('.summernote').summernote(
                {
                    height: 300,
                    focus: true
                }
            );

            $(document).on("click", ".browse", function() {
                var file = $(this).parents().find(".bg-image");
                file.trigger("click");
            });

            $('.bg-image').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);
            
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

            $(document).on("click", ".browse-sign", function() {
                var file = $(this).parents().find(".sign-image");
                file.trigger("click");
            });

            $('.sign-image').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);
            
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview-sign-image").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

            
            $(document).on("click", ".browse-section-four", function() {
                var file = $(this).parents().find(".section-four-image");
                file.trigger("click");
            });

            $('.section-four-image').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);
            
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("section-four-preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

            $(document).on("click", ".browse-section-five", function() {
                var file = $(this).parents().find(".section-five-image");
                file.trigger("click");
            });

            $('.section-five-image').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);
            
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("section-five-preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
        });

    </script>
@endsection
