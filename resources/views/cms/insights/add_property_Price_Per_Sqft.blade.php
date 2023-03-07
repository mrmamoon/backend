@extends('cms.layouts.masterpage')
@section('title', 'Developers')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 <style>
.error{
    color: red;
}

.file {
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
    width: 360px;
    height: 215px;
}

.photo img {
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
                    <!-- <li class="breadcrumb-item">All Vehicles</li> -->
                    <li class="breadcrumb-item"><a href="{{route('insights')}}">Insight</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$isEdit ? 'Edit' : 'Add'}}</li>
                </ol>
                
                        
                <!-- <form action="{{ $isEdit ? route('insight.update_property_Price_Per_Sqft', [$property_Price_Per_Sq->id]) : route('insight.store_property_Price_Per_Sqft') }}" method="POST" enctype="multipart/form-data"> -->
                <form action="{{ route('insight.csvTest') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        <input type="hidden" name="_method" value="put">
                    @endif
                     <div style="background: #294159;">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Insight / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('insights')}}" class="btn btn-danger"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                &nbsp; | &nbsp; Go Back</a>

                                <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>    
                                &nbsp; | &nbsp; {{ $isEdit ? 'Update' : 'Save' }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="uploadCSV">Upload Csv</label>

                        <input id="uploadCSV" type="file" name="fileImport" accept=".csv" />


                        <div class="form-group col-md-12">
                            <label for="name">Key <span class="text-danger"> * </span></label>
                            <input type="text" name="key" class="form-control" placeholder="Enter Key..." autofocus="true"/>
                        </div>
                    </div>
                    <!--<div class="widget-content widget-content-area">
                    <div class="form-row mb-4">
                            
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Year <span class="text-danger"> * </span></label>
                                        <input type="text" name="year"  id="name" value="{{ $property_Price_Per_Sq->year ?? old('year') ?? null }}"
                                            class="form-control" placeholder="Enter Year..." autofocus="true">
                                        @if ($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="meta_title">January <span class="text-danger">*</span></label>
                                        <input type="text" name="january" id="meta_title" value="{{ $property_Price_Per_Sq->january ?? old('january') ?? null }}"
                                            class="form-control" placeholder="Enter Price in January..." >
                                        @if ($errors->has('meta_title'))
                                            <div class="error">{{ $errors->first('meta_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="keywords">February <span class="text-danger">*</span></label>
                                        <input type="text" name="february" id="keywords" value="{{ $property_Price_Per_Sq->february ?? old('february') ?? null }}"
                                            class="form-control" placeholder="Enter Price in February..." >
                                        @if ($errors->has('keywords'))
                                            <div class="error">{{ $errors->first('keywords') }}</div>
                                        @endif
                                    </div><div class="form-group col-md-6">
                                        <label for="meta_title">March <span class="text-danger">*</span></label>
                                        <input type="text" name="march" id="meta_title" value="{{ $property_Price_Per_Sq->march ?? old('march') ?? null }}"
                                            class="form-control" placeholder="Enter Price in March..." >
                                        @if ($errors->has('meta_title'))
                                            <div class="error">{{ $errors->first('meta_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="keywords">April <span class="text-danger">*</span></label>
                                        <input type="text" name="april" id="keywords" value="{{ $property_Price_Per_Sq->april ?? old('april') ?? null }}"
                                            class="form-control" placeholder="Enter Price in April..." >
                                        @if ($errors->has('keywords'))
                                            <div class="error">{{ $errors->first('keywords') }}</div>
                                        @endif
                                    </div><div class="form-group col-md-6">
                                        <label for="meta_title">May <span class="text-danger">*</span></label>
                                        <input type="text" name="may" id="meta_title" value="{{ $property_Price_Per_Sq->may ?? old('may') ?? null }}"
                                            class="form-control" placeholder="Enter Price in May..." >
                                        @if ($errors->has('meta_title'))
                                            <div class="error">{{ $errors->first('meta_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="keywords">June <span class="text-danger">*</span></label>
                                        <input type="text" name="june" id="keywords" value="{{ $property_Price_Per_Sq->june ?? old('june') ?? null }}"
                                            class="form-control" placeholder="Enter Price in June..." >
                                        @if ($errors->has('keywords'))
                                            <div class="error">{{ $errors->first('keywords') }}</div>
                                        @endif
                                    </div><div class="form-group col-md-6">
                                        <label for="meta_title">July <span class="text-danger">*</span></label>
                                        <input type="text" name="july" id="meta_title" value="{{ $property_Price_Per_Sq->july ?? old('july') ?? null }}"
                                            class="form-control" placeholder="Enter Price in July..." >
                                        @if ($errors->has('meta_title'))
                                            <div class="error">{{ $errors->first('meta_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="keywords">August <span class="text-danger">*</span></label>
                                        <input type="text" name="august" id="keywords" value="{{ $property_Price_Per_Sq->august ?? old('august') ?? null }}"
                                            class="form-control" placeholder="Enter Price in August..." >
                                        @if ($errors->has('keywords'))
                                            <div class="error">{{ $errors->first('keywords') }}</div>
                                        @endif
                                    </div><div class="form-group col-md-6">
                                        <label for="meta_title">September <span class="text-danger">*</span></label>
                                        <input type="text" name="september" id="meta_title" value="{{ $property_Price_Per_Sq->september ?? old('september') ?? null }}"
                                            class="form-control" placeholder="Enter Price in September..." >
                                        @if ($errors->has('meta_title'))
                                            <div class="error">{{ $errors->first('meta_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="keywords">October <span class="text-danger">*</span></label>
                                        <input type="text" name="october" id="keywords" value="{{ $property_Price_Per_Sq->october ?? old('october') ?? null }}"
                                            class="form-control" placeholder="Enter Price in October..." >
                                        @if ($errors->has('keywords'))
                                            <div class="error">{{ $errors->first('keywords') }}</div>
                                        @endif
                                    </div><div class="form-group col-md-6">
                                        <label for="meta_title">November <span class="text-danger">*</span></label>
                                        <input type="text" name="november" id="meta_title" value="{{ $property_Price_Per_Sq->november ?? old('november') ?? null }}"
                                            class="form-control" placeholder="Enter Price in November..." >
                                        @if ($errors->has('meta_title'))
                                            <div class="error">{{ $errors->first('meta_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="keywords">December <span class="text-danger">*</span></label>
                                        <input type="text" name="december" id="keywords" value="{{ $property_Price_Per_Sq->december ?? old('december') ?? null }}"
                                            class="form-control" placeholder="Enter Price in December..." >
                                        @if ($errors->has('keywords'))
                                            <div class="error">{{ $errors->first('keywords') }}</div>
                                        @endif
                                    </div>
                                    
                                </div>
                                </div>                                
                            </div>  
                        </div>
                    </div> -->
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection
@section('bottom-mid-scripts')
    <script src="{{ url('') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/custom-select2.js"></script>
    <script src="{{ url('') }}/assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
@endsection
@section('bottom-bot-scripts')
    <script>
        $(document).ready(function() {
            $('form').parsley();

            $('.summernote').summernote(
                {
                    height: 300,
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

            var secondUpload = new FileUploadWithPreview('galleryImages');

            var num = 1;

            $(document).on('click' , '.add_more1' , function(){
                $('.addMore_btn').append(
                `<div class="row addmore_cont1 ml30">
                    
                    <input type="hidden" value="1" class="radio_counter1" />
                    
                    <div class="form-group col-md-8">
                        <input type="text" name="feature_name[]" value=""
                            class="form-control" placeholder="Feature Name...">
                        @if ($errors->has('feature_name'))
                            <div class="error">{{ $errors->first('feature_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" name="feature_value[]" value=""
                            class="form-control" placeholder="Value...">
                        @if ($errors->has('feature_value'))
                            <div class="error">{{ $errors->first('feature_value') }}</div>
                        @endif
                    </div>

                    <div class="col-md-1 mt-1">
                        <a href="javascript:void(0);" id="remove" class="remove">
                            <svg viewBox="0 0 24 24" width="32" height="32" stroke="#e20810" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        </a>
                    </div>`
                );

                $('form').parsley();

                
                $('.remove').click(function () {
                    $(this).parent().parent().remove();
                });
            });
        });

    </script>
@endsection
