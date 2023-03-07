@extends('cms.layouts.masterpage')
@section('title', 'Vacancies')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
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
    width: 100%;
    height: 280px;
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
                    <li class="breadcrumb-item">Master Files</li>
                    <li class="breadcrumb-item"><a href="{{route('property-type')}}">Property Type</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$isEdit ? 'Edit' : 'Add'}}</li>
                </ol>
                
                        
                <form action="{{ $isEdit ? route('property-type.update', [$propertyType->id]) : route('property-type.store') }}" method="POST">
                    @csrf
                    @if ($isEdit)
                        <input type="hidden" name="_method" value="put">
                    @endif
                    <div style="background: #294159;">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Property Type / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('property-type')}}" class="btn btn-danger"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>    
                                &nbsp; | &nbsp; Go Back</a>

                                <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>    
                                &nbsp; | &nbsp; {{ $isEdit ? 'Update' : 'Save' }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="form-row mb-4">
                            
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Type <span class="text-danger"> * </span></label>
                                        <input type="text" name="type" value="{{ $propertyType->type ?? old('type') ?? null }}"
                                            class="form-control" placeholder="Enter Department Name..." required>
                                        @if ($errors->has('type'))
                                            <div class="error">{{ $errors->first('type') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Code <span class="text-danger"> * </span></label>
                                        <input type="text" name="code" value="{{ $propertyType->code ?? old('code') ?? null }}"
                                            class="form-control" placeholder="Enter Position Name..." required>
                                        @if ($errors->has('code'))
                                            <div class="error">{{ $errors->first('code') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group col-md-6">
                                <label for="">Meta Title </label>
                                <input type="text" name="meta_title" value="{{ $blog->meta_title ?? old('meta_title') ?? null }}"
                                    class="form-control" placeholder="Enter Meta Title...">
                                @if ($errors->has('meta_title'))
                                    <div class="error">{{ $errors->first('meta_title') }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Keywords </label>
                                <input type="text" name="keywords" value="{{ $blog->keywords ?? old('keywords') ?? null }}"
                                    class="form-control" placeholder="Enter keywords...">
                                @if ($errors->has('keywords'))
                                    <div class="error">{{ $errors->first('keywords') }}</div>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">Meta Description</label>
                                <input type="text" name="meta_description" value="{{ $blog->meta_description ?? old('meta_description') ?? null }}"
                                    class="form-control" placeholder="Enter Meta Description..."    >
                                @if ($errors->has('meta_description'))
                                    <div class="error">{{ $errors->first('meta_description') }}</div>
                                @endif
                            </div> -->
                            
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
    <script src="{{ url('') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/custom-select2.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
