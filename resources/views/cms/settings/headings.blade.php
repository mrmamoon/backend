@extends('cms.layouts.masterpage')
@section('title', 'Settings')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/components/tabs-accordian/custom-accordions.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
 <style>
.error{
    color: red;
} 

.file {
  visibility: hidden;
  position: absolute;
}

.logo-footer {
  visibility: hidden;
  position: absolute;
}

.img-header {
  visibility: hidden;
  position: absolute;
}

.img-thumbnail{
    cursor: pointer;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}
.img-thumbnail-header{
    cursor: pointer;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}

.images {
    display: flex;
    flex-wrap: wrap;
}

.images-header {
    display: flex;
    flex-wrap: wrap;
}

.photo {
    width: 230px;
    height: 120px;
}

.photo1 {
    width: 230px;
    height: 230px;
}

.photo img {
    width: 100%;
    height: 100%;
}

.photo-header {
    width: 1850px;
    height: 400px;
}

.photo-header img {
    width: 100%;
    height: 100%;
}

.photo-footer {
    width: 320px;
    height: 120px;
}

.photo-footer img {
    width: 100%;
    height: 100%;
}

.img-thumbnail:hover {
  box-shadow: 0 0 2px 1px #000;
}

.img-thumbnail-header:hover {
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
                    <li class="breadcrumb-item active" aria-current="page">Headings</li>
                </ol>
                
                    <form action="{{route('headings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div style="background: #294159;">
                            <div class="row">
                                <div class="col-md-6 mt15 pl30">
                                    <h5 class="text-white">Headings</h5>
                                </div>

                                <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> 
                                    <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>    
                                    &nbsp; | &nbsp; Update</button>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                            <div id="toggleAccordion">
                                
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6 mt10">
                                                <label for="">Home Page 1st Heading <span class="text-danger"> * </span></label>
                                                <input type="text" name="key[homePage1stHeading]" value="{{ getHeading('homePage1stHeading') ?? null }}"
                                                    class="form-control" placeholder="Site Name..." required>
                                                @if ($errors->has('homePage1stHeading'))
                                                    <div class="error">{{ $errors->first('homePage1stHeading') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mt10">
                                                <label for="">Home Page 1st SubHeading <span class="text-danger"> * </span></label>
                                                <input type="text" name="key[homePage1stSubHeading]" value="{{ getHeading('homePage1stSubHeading') ?? null }}"
                                                    class="form-control" placeholder="Site Name..." required>
                                                @if ($errors->has('homePage1stSubHeading'))
                                                    <div class="error">{{ $errors->first('homePage1stSubHeading') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mt10">
                                                <label for="">Home Page 2nd Heading <span class="text-danger"> * </span></label>
                                                <input type="text" name="key[homePage2ndHeading]" value="{{ getHeading('homePage2ndHeading') ?? null }}"
                                                    class="form-control" placeholder="Site Email..." required>
                                                @if ($errors->has('homePage2ndHeading'))
                                                    <div class="error">{{ $errors->first('homePage2ndHeading') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mt10">
                                                <label for="">Home Page 2nd SubHeading<span class="text-danger"> * </span></label>
                                                <input type="text" name="key[homePage2ndSubHeading]" value="{{ getHeading('homePage2ndSubHeading') ?? null }}"
                                                    class="form-control" placeholder="Site Email..." required>
                                                @if ($errors->has('homePage2ndSubHeading'))
                                                    <div class="error">{{ $errors->first('homePage2ndSubHeading') }}</div>
                                                @endif
                                            </div>
                                            <!-- <div class="col-md-6 mt10">
                                                <label for="">Home Page 3rd SubHeading<span class="text-danger"> * </span></label>
                                                <input type="text" name="key[homePage3rdHeading]" value="{{ getHeading('homePage3rdHeading') ?? null }}"
                                                    class="form-control" placeholder="Site Email..." required>
                                                @if ($errors->has('homePage3rdHeading'))
                                                    <div class="error">{{ $errors->first('homePage3rdHeading') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mt10">
                                                <label for="">Home Page 3rd SubHeading<span class="text-danger"> * </span></label>
                                                <input type="text" name="key[homePage3rdSubHeading]" value="{{ getHeading('homePage3rdSubHeading') ?? null }}"
                                                    class="form-control" placeholder="Site Email..." required>
                                                @if ($errors->has('homePage3rdSubHeading'))
                                                    <div class="error">{{ $errors->first('homePage3rdSubHeading') }}</div>
                                                @endif
                                            </div> -->
                                            <div class="col-md-6 mt10">
                                                <label for="">Home Page 4th SubHeading<span class="text-danger"> * </span></label>
                                                <input type="text" name="key[homePage4thHeading]" value="{{ getHeading('homePage4thHeading') ?? null }}"
                                                    class="form-control" placeholder="Site Email..." required>
                                                @if ($errors->has('homePage4thHeading'))
                                                    <div class="error">{{ $errors->first('homePage4thHeading') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mt10">
                                                <label for="">Home Page 5th SubHeading<span class="text-danger"> * </span></label>
                                                <input type="text" name="key[homePage5thHeading]" value="{{ getHeading('homePage5thHeading') ?? null }}"
                                                    class="form-control" placeholder="Site Email..." required>
                                                @if ($errors->has('homePage5thHeading'))
                                                    <div class="error">{{ $errors->first('homePage5thHeading') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mt10">
                                                <label for="">Home Page 5th SubHeading<span class="text-danger"> * </span></label>
                                                <input type="text" name="key[homePage5thSubHeading]" value="{{ getHeading('homePage5thSubHeading') ?? null }}"
                                                    class="form-control" placeholder="Site Email..." required>
                                                @if ($errors->has('homePage5thSubHeading'))
                                                    <div class="error">{{ $errors->first('homePage5thSubHeading') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- <hr>
                                    <h5 class="mt10"><b>Social Links</b></h5>
                                <hr> -->
                                
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
    <script src="{{ url('') }}/assets/js/components/ui-accordions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/custom-select2.js"></script>
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

            $(document).on("click", ".browse", function() {
                var file = $(this).parents().find(".file");
                file.trigger("click");
            });


            $('.file').change(function(e) {
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

            $(document).on("click", ".browse1", function() {
                var file = $(this).parents().find(".logo-footer");
                file.trigger("click");
            });

            $('.logo-footer').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);
                
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview-footer-logo").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

            $(document).on("click", ".browse-img-header", function() {
                var file1 = $(this).parents().find(".img-header");
                file1.trigger("click");
            }); 

            $('.img-header').change(function(e) {
                
                var fileName = e.target.files[0].name;
                
                $("#file").val(fileName);
                
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview-img-header").src = e.target.result;
                };

                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

            
        });

        

    </script>
@endsection
