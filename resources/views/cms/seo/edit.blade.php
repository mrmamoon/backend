@extends('cms.layouts.masterpage')
@section('title', 'SEO')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/components/tabs-accordian/custom-accordions.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet"> -->
    
 <style>
.error{
    color: red;
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
                    <li class="breadcrumb-item"><a href="{{route('seo')}}">SEO</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$web_menu->name}}</li>
                </ol>
                
                <form action="{{ route('seo.update',$web_menu->slug) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    
                    <div style="background: black;">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">SEO - {{$web_menu->name}}</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('seo')}}" class="btn btn-danger"> 
                                    <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg> &nbsp; | &nbsp; Go Back</a>

                                <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> 
                                <svg viewBox="0 0 24 24" width="10" height="10" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>    
                                &nbsp; | &nbsp; {{ $isEdit ? 'Update' : 'Save' }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        
                        <div id="toggleAccordion">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $web_menu->meta_title ?? old('meta_title') ?? null }}"
                                        class="form-control" placeholder="Meta Title...">
                                    @if ($errors->has('meta_title'))
                                        <div class="error">{{ $errors->first('meta_title') }}</div>
                                    @endif
                                </div>
                                <!-- <div class="form-group col-md-12">
                                    <label for="">Meta Keywords</label><br>
                                    <input type="text" id="#inputTag" value="{{ $web_menu->keywords ?? old('keywords') ?? null }}" data-role="tagsinput">
                                    @if ($errors->has('meta_title'))
                                        <div class="error">{{ $errors->first('meta_title') }}</div>
                                    @endif
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label for="">Meta Description</label>
                                    <textarea rows="5" type="text" name="meta_description" class="form-control" placeholder="Meta Description...">{{ $web_menu->meta_description ?? old('meta_description') ?? null }}</textarea>
                                    @if ($errors->has('meta_description'))
                                        <div class="error">{{ $errors->first('meta_description') }}</div>
                                    @endif
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
    <script src="{{ url('') }}/assets/js/components/ui-accordions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/custom-select2.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <!-- <script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script> -->
@endsection
@section('bottom-bot-scripts')
    <script>
        $(document).ready(function() {
            $('form').parsley();

            // $("#inputTag").tagsinput('items');

            $('.summernote').summernote(
                {
                    height: 300,
                    focus: true
                }
            );
        });

    </script>
@endsection
