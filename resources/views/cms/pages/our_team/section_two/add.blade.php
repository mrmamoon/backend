@extends('cms.layouts.masterpage')
@section('title', 'Section Two')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.css">
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
    width: 270px;
    height: 225px;
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
                    <li class="breadcrumb-item">Site Management</li>
                    <li class="breadcrumb-item"><a href="{{route('other_pages')}}">Other Pages</a></li>
                    <li class="breadcrumb-item"><a href="{{route('other_pages.our_team')}}">Our Team</a></li>
                    <li class="breadcrumb-item"><a href="{{route('other_pages.our_team')}}">Section Two</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$isEdit ? 'Edit' : 'Add'}}</li>
                </ol>
                
                        
                <form action="{{ $isEdit ? route('our_team_section_two.update', [$our_team_section_two->id]) : route('our_team_section_two.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        <input type="hidden" name="_method" value="put">
                    @endif
                    <div style="background: black;">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Section Two / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('other_pages.our_team')}}" class="btn btn-danger"> 
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
                            <div class="col-md-2">
                                <label>Image <small>( Dimension : 750 x 659 )</small> <span class="text-danger"> *</span> </label>
                                <input {{!$isEdit ? 'required' : null}} type="file" name="image"  class="file" accept="image/*" >
                                <div class="images">
                                    <div class="photo">
                                        <img src="{{url('')}}/uploads/{{$our_team_section_two->image_one ?? 'placeholder-small.jpg'}}" id="preview" class="img-thumbnail browse">
                                    </div>
                                    @if ($errors->has('image'))
                                        <div class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Name <span class="text-danger"> * </span></label>
                                        <input type="text" name="name" value="{{ $our_team_section_two->heading_one ?? old('name') ?? null }}"
                                            class="form-control" placeholder="Name..." required>
                                        @if ($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Designation <span class="text-danger"> * </span></label>
                                        <input type="text" name="designation" value="{{ $our_team_section_two->heading_two ?? old('designation') ?? null }}"
                                            class="form-control" placeholder="Designation..." required>
                                        @if ($errors->has('designation'))
                                            <div class="error">{{ $errors->first('designation') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-12 mt10">
                                        <label for="">Short Description <span class="text-danger"> * </span></label>
                                        <textarea name="short_description" class="form-control" placeholder="Short Description..." required>{{ $our_team_section_two->description_one ?? old('short_description') ?? null }}</textarea>
                                        @if ($errors->has('short_description'))
                                            <div class="error">{{ $errors->first('short_description') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mt10">
                                        <label for="">Twitter Link <span class="text-danger"> * </span></label>
                                        <input type="text" name="twitter_link" value="{{ $our_team_section_two->link_one ?? old('twitter_link') ?? null }}"
                                            class="form-control" placeholder="Twitter Link..." required>
                                        @if ($errors->has('twitter_link'))
                                            <div class="error">{{ $errors->first('twitter_link') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mt10">
                                        <label for="">LinkedIn Link <span class="text-danger"> * </span></label>
                                        <input type="text" name="linkedin_link" value="{{ $our_team_section_two->link_two ?? old('linkedin_link') ?? null }}"
                                            class="form-control" placeholder="LinkedIn Link..." required>
                                        @if ($errors->has('linkedin_link'))
                                            <div class="error">{{ $errors->first('linkedin_link') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mt10">
                                        <label for="">Facebook Link <span class="text-danger"> * </span></label>
                                        <input type="text" name="facebook_link" value="{{ $our_team_section_two->link_three ?? old('facebook_link') ?? null }}"
                                            class="form-control" placeholder="Facebook Link..." required>
                                        @if ($errors->has('facebook_link'))
                                            <div class="error">{{ $errors->first('facebook_link') }}</div>
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
    <script src="{{ url('') }}/plugins/select2/select2.min.js"></script>
    <script src="{{ url('') }}/plugins/select2/custom-select2.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
@endsection
@section('bottom-bot-scripts')
    <script>
        $(document).ready(function() {
            $('form').parsley();

            $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
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
            
        });

    </script>
@endsection
