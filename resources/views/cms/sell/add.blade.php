@extends('cms.layouts.masterpage')
@section('title', 'sell')
@section('top-styles')
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.css">
<link href="{{ url('') }}/assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/assets/css/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 <style>
.error{
    color: red;
}

.file {
  visibility: hidden;
  position: absolute;
}

.file1 {
  visibility: hidden;
  position: absolute;
}
.file2 {
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
                    <li class="breadcrumb-item"><a href="{{route('sell')}}">Sell Property</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$isEdit ? 'Edit' : 'Add'}}</li>
                </ol>
                
                        
                <form action="{{ $isEdit ? route('sell.update', [$project->id]) : route('sell.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        <input type="hidden" name="_method" value="put">
                    @endif
                    <div style="background: #273443;">
                        <div class="row">
                            <div class="col-md-6 mt15 pl30">
                                <h5 class="text-white">Sell Property / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                            </div>

                            <div class="col-md-6 text-right">
                                <a href="{{route('sell')}}" class="btn btn-danger"> 
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
                            
                            <div class="col-md-3">
                                <label>Featured Image <small>( Dimension : 1920 x 874 )</small> <span class="text-danger"> *</span> </label>
                                <input {{!$isEdit ? 'required' : null}} type="file" name="featured_image"  class="file" accept="image/*" >
                                <div class="images">
                                    <div class="photo">
                                        <img src="{{url('')}}/uploads/{{$project->featured_image ?? 'placeholder-small.jpg'}}" id="preview" class="img-thumbnail browse">
                                    </div>
                                    @if ($errors->has('image'))
                                        <div class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label>Agent Image <small>( Dimension : 255 x 255 )</small> <span class="text-danger"> *</span> </label>
                                <!-- <input type="file" name="agent_img"  
                                    @if($isEdit) value="{{url('')}}/uploads/{{ $project->agent_image }}"
                                    @else value="{{ url('') }}/uploads/{{ Auth::user()->image }}" @endif 
                                     class="file2" accept="image/*" > -->
                                     <input type="text" name="agent_img"  
                                    @if($isEdit) value="{{ $project->agent_image ?? old('title') ?? null }}"
                                    @else value="{{ Auth::user()->image }}" @endif 
                                     class="file2" >
                                <div class="images">
                                    <div class="photo">
                                        @if($isEdit)
                                        <img src="{{url('')}}/uploads/{{$project->agent_image ?? 'placeholder-small.jpg'}}" id="preview2" class="img-thumbnail browse2">
                                        @else
                                        <img src="{{ url('') }}/uploads/{{Auth::user()->image ?? 'placeholder-small.jpg'}}" id="preview2" class="img-thumbnail browse2">
                                        @endif
                                    </div>
                                    @if ($errors->has('agent_image'))
                                        <div class="error">{{ $errors->first('agent_image') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label>Bannar Image <small>( Dimension : 1920 x 874 )</small> <span class="text-danger"> *</span> </label>
                                <input {{!$isEdit ? 'required' : null}} type="file" name="bannar_image"  class="file1" accept="image/*" >
                                <div class="images">
                                    <div class="photo">
                                        <img src="{{url('')}}/uploads/{{$project->bannar_image ?? 'placeholder-small.jpg'}}" id="preview1" class="img-thumbnail browse1">
                                    </div>
                                    @if ($errors->has('image'))
                                        <div class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    
                                    <div class="form-group col-md-6">
                                        <label for="name">Name <span class="text-danger"> * </span></label>
                                        <input type="text" name="name" id="name" 
                                            class="form-control" placeholder="Enter Name..." autofocus="true" required value="{{ $project->title ?? old('title') ?? null }}">
                                        @if ($errors->has('title'))
                                            <div class="error">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Agent Name <span class="text-danger"> * </span></label>
                                        <input type="text" name="agent_name" id="name" 
                                            class="form-control" placeholder="Enter Name..." autofocus="true" @if($isEdit) value="{{ $project->agent_name ?? old('agent_name') ?? Auth::user()->name }}"@else value="{{ Auth::user()->name}}" @endif readonly="">
                                        @if ($errors->has('agent_name'))
                                            <div class="error">{{ $errors->first('agent_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Phone <span class="text-danger"> * </span></label>
                                        <input type="phone" name="phone" 
                                            class="form-control" placeholder="Phone"  @if($isEdit) value="{{ $project->phone ?? old('phone') ?? Auth::user()->phone }}"@else value="{{ Auth::user()->phone}}" @endif readonly="">
                                        @if ($errors->has('phone'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Email <span class="text-danger"> * </span></label>
                                        <input type="email" name="email" 
                                            class="form-control" placeholder="Email" @if($isEdit) value="{{ $project->email ?? old('email') ?? Auth::user()->email }}"@else value="{{ Auth::user()->email}}" @endif readonly="">
                                        @if ($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Price <span class="text-danger"> * </span></label>
                                        <input type="text" name="price" value="{{ $project->price ?? old('price') ?? null }}"
                                            class="form-control" placeholder="Enter Price..." >
                                            @if ($errors->has('price'))
                                            <div class="error">{{ $errors->first('price') }}</div>
                                            @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Location <span class="text-danger"> * </span></label>
                                        <input type="text" name="url" value="{{ $project->url ?? old('url') ?? null }}"
                                            class="form-control" placeholder="Location" >
                                        @if ($errors->has('url'))
                                            <div class="error">{{ $errors->first('url') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="row">
                                            
                                    <div class="form-group col-md-8">
                                        <label for="">External Reference Number <span class="text-danger"> * </span></label>
                                        <input type="text" name="ext_ref_num" value="{{ $project->ext_ref_num ?? old('ext_ref_num') ?? null }}"
                                            class="form-control" placeholder="External Reference Number" >
                                        @if ($errors->has('ext_ref_num'))
                                            <div class="error">{{ $errors->first('ext_ref_num') }}</div>

                                        @endif
                                    </div>
                                    <div class="form-group col-md-4" style="margin: auto;">
                                        <label for="showRefNum" style="user-select: none;">
                                            Show Ref No. on Website  <input type="checkbox" name="showRefNum" id="showRefNum" value="1" class=" form-control-sm" placeholder="External Reference Number" style="height:1%;"></label>
                                    </div>
                                    </div>
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Permit Number <span class="text-danger"> * </span></label>
                                        <input type="text" name="permit_no" value="{{ $project->permit_no ?? old('permit_no') ?? null }}"
                                            class="form-control" placeholder="Permit Number" >
                                        @if ($errors->has('permit_no'))
                                            <div class="error">{{ $errors->first('permit_no') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Select Developer <span class="text-danger"> * </span></label>
                                        <select class="custom-select" id="inputGroupSelect01" name="network_id" {{!$isEdit ? 'required' : null}}>
                                                <option class="dropdown-item" selected disabled>Select Developer</option>

                                            @foreach($developers as $developer)
                                                <option @if($isEdit){{ $project->developer_id == $developer->id ? 'selected' : null }}@endif value="{{ $developer->id }}" class="dropdown-item" >{{ $developer->developer_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Bedrooms <span class="text-danger"> * </span></label>
                                        <input type="text" name="bedrooms" 
                                            class="form-control" placeholder="No of Bedrooms" value="{{ $project->bedrooms ?? old('bedrooms') ?? null }}">
                                        @if ($errors->has('bedrooms'))
                                            <div class="error">{{ $errors->first('bedrooms') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="">Bathrooms <span class="text-danger"> * </span></label>
                                        <input type="text" name="bathrooms" 
                                            class="form-control" placeholder="No of bathrooms" value="{{ $project->bathrooms ?? old('bathrooms') ?? null }}">
                                        @if ($errors->has('bathrooms'))
                                            <div class="error">{{ $errors->first('bathrooms') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Type <span class="text-danger"> * </span></label>
                                        <select class="custom-select property-type" name="type" required> 
                                            <option selected disabled>Select type</option>
                                            @foreach($types as $type)
                                            <option @if($isEdit){{ $project->type == $type->type ? 'selected' : null }}@endif value="{{ $type->type }}">{{$type->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6 areasqft">
                                        <label for="">Area sqft  <span class="text-danger"> * </span></label>
                                        <input type="text" name="area" 
                                            class="form-control" placeholder="Area" value="{{ $project->area ?? old('area') ?? null }}" >
                                        @if ($errors->has('area'))
                                            <div class="error">{{ $errors->first('area') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-6 bultsqft" style="display: none">
                                        <label for="">Built sqft  <span class="text-danger"> * </span></label>
                                        <input type="text" name="builtArea" 
                                            class="form-control" placeholder="Area" value="{{ $project->built_area ?? old('built_area') ?? null }}" >
                                        @if ($errors->has('area'))
                                            <div class="error">{{ $errors->first('area') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-6 plotsqft" style="display: none">
                                        <label for="">Plot sqft  <span class="text-danger"> * </span></label>
                                        <input type="text" name="plotArea" 
                                            class="form-control" placeholder="Area" value="{{ $project->plot_area ?? old('plot_area') ?? null }}" >
                                        @if ($errors->has('area'))
                                            <div class="error">{{ $errors->first('area') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="">Guests <span class="text-danger"> * </span></label>
                                        <input type="text" name="guests" 
                                            class="form-control" placeholder="Guestrooms" value="{{ $project->guests ?? old('guests') ?? null }}">
                                        @if ($errors->has('guests'))
                                            <div class="error">{{ $errors->first('guests') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Seo Title <span class="text-danger"> * </span></label>
                                        <input type="text" name="seo_title" 
                                            class="form-control" placeholder="Seo Title" required value="{{ $project->seo_title ?? old('seo_title') ?? null }}">
                                        @if ($errors->has('seo_title'))
                                            <div class="error">{{ $errors->first('seo_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Meta Description <span class="text-danger"> * </span></label>
                                        <input type="text" name="meta_description" 
                                            class="form-control" placeholder="Meta Description" required value="{{ $project->meta_description ?? old('meta_description') ?? null }}">
                                        @if ($errors->has('meta_description'))
                                            <div class="error">{{ $errors->first('meta_description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Meta Keywords <span class="text-danger"> * </span></label>
                                        <input type="text" name="meta_keywords" 
                                            class="form-control" placeholder="Meta Keywords" required value="{{ $project->meta_keywords ?? old('meta_keywords') ?? null }}">
                                        @if ($errors->has('meta_keywords'))
                                            <div class="error">{{ $errors->first('meta_keywords') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="">Featured <span class="text-danger"> * </span></label>
                                          
                                        <select class="custom-select " id="inputGroupSelect01" name="featured">
                                            <option value="" class="dropdown-item" disabled selected>Select Featured</option>
                                            <option value="1" class="dropdown-item" >Yes</option>
                                            <option value="0" class="dropdown-item" >No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="">Property Status <span class="text-danger"> * </span></label>
                                        <select class="custom-select " id="inputGroupSelect01" name="property_status" {{!$isEdit ? 'required' : null}}>
                                            <option class="dropdown-item" disabled selected>Select Status</option>
                                            <option value="Ready" class="dropdown-item" >Ready</option>
                                            <option value="Off-Plan" class="dropdown-item" >Off-Plan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group col-md-11 mt10">    
                                <label>Amenities</label>
                            </div>
                            
                            
                            

                            <div class="form-group col-md-12">
                                <div class="addMore">
                                    <div class="addmore_cont">
                                        <div class="addMore_btn">
                                            <table id="datatable" class="table table-bordered table-hover table-condensed mb-4" width="100%" cellspacing="0" cellpadding="0">
                                                <thead class="datatable">
                                                    <tr>
                                                        <th class="no-sort text-center" width="5%">Select</th>
                                                        <th>Name</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Amenities <small>( Separate by a coma ',' )</small></label>
                                        <textarea cols="200" class="form-control" name="amenities" {{!$isEdit ? 'required' : null}}>{!! $project->amenities ?? null !!}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Amenities Listing Procedure <small>( Separate by a coma ',' )</small> <span><i class="fa-solid fa-question"></i></span></h5>
                                        <label>Amenities Should be listed priority wise, Amenities With highest priority should be listed first<br></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <label>Description</label>
                                <textarea cols="200" class="summernote" name="description" {{!$isEdit ? 'required' : null}}>{!! $project->description ?? null !!}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label>Nearby Hospitals <small>( Separate by a coma ',' )</small></label>
                                <textarea cols="200" class="form-control" name="nearby_hospitals" {{!$isEdit ? 'required' : null}}>{!! $project->nearest_hospitals ?? null !!}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label>Nearby Schools <small>( Separate by a coma ',' )</small></label>
                                <textarea cols="200" class="form-control" name="nearby_schools" {{!$isEdit ? 'required' : null}}>{!! $project->nearest_schools ?? null !!}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label>Nearby Shopping Malls <small>( Separate by a coma ',' )</small></label>
                                <textarea cols="200" class="form-control" name="nearby_shopping_malls" {{!$isEdit ? 'required' : null}}>{!! $project->nearest_shopping_malls ?? null !!}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label>Nearby Gyms <small>( Separate by a coma ',' )</small></label>
                                <textarea cols="200" class="form-control" name="nearby_gyms" {{!$isEdit ? 'required' : null}}>{!! $project->nearest_gyms ?? null !!}</textarea>
                            </div>

                             @if($isEdit)

                            <div class="col-md-12 mt30">
                                <div class="custom-file-container" data-upload-id="galleryImages">
                                    <label>Gallery Images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" name="multi_images[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                     @php
                                if ($project->images !="") {
                                $images = $project->images;
                                $img3 = explode(',', $images);
                                foreach($img3 as $images){
                                    if($images != '')
                                    {
                                @endphp
                                   
                                    <div class="custom-file-container__image-multi-preview" data-upload-token="c83aznuntollow3fc9m91" style="background-image: url('{{url('')}}/uploads/{{$images}}'); ">
                                        
                                            <span class="custom-file-container__image-multi-preview__single-image-clear ">
                                                <span class="custom-file-container__image-multi-preview__single-image-clear__icon remove" data-upload-token="c83aznuntollow3fc9m91" id="{{$images}}">×</span>
                                            </span>

                                    </div>
                                    @php }
                                }
                            } 
                                @endphp 
                                    
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>

                            @else
                            <div class="col-md-12 mt30">
                                <div class="custom-file-container" data-upload-id="galleryImages">
                                    <label>Gallery Images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" name="multi_images[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>

                                    <div class="custom-file-container__image-preview"></div>
                                    
                                </div>
                            </div>
                            @endif
                            
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
    <script src="{{ url('') }}/assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="{{ url('') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>

<script src="{{ url('') }}/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/assets/js/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('') }}/assets/js/datatables/axios.min.js"></script>
@endsection
@section('bottom-bot-scripts')
@include('cms.sell.includes.amenities-js')
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

             $(document).on("click", ".browse1", function() {
            var file = $(this).parents().find(".file1");
            file.trigger("click");
            });
            $('.file1').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            
            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview1").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
            });
            $(document).on("click", ".browse2", function() {
            var file = $(this).parents().find(".file2");
            file.trigger("click");
            });
            $('.file2').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            
            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview2").src = e.target.result;
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
            @if($isEdit)
            $('.remove').click(function () {
                    var image = $(this).attr('id');
                    var projectId = {{$project->id}};
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#4fa7f3',
                        cancelButtonColor: '#d57171',
                        confirmButtonText: 'Yes, delete it!'
                      }).then(function (result) {
                        if (result.value) {
                        axios
                          .post('{{route("projectImage.destroy")}}', {
                            _method: 'delete',
                            _token: '{{csrf_token()}}',
                            image: image,
                            projectId: projectId
                          })
                          .then(function (response) {

                            swal(
                              'Deleted!',
                              'Image has been deleted.',
                              'success'
                            )

                            table.draw();
                          })
                          .catch(function (error) {
                            console.log(error);
                            swal(
                              'Failed!',
                              error.response.data.error,
                              'error'
                            )
                          });
                        }
                        // location.reload(true)
                      });

                    $(this).parent().parent().remove();
                    // alert($(this).attr('id'));
                });
            @endif

            var selectedType = $('.property-type').find(":selected").val(); 
                if(selectedType == 'Villa' || selectedType == 'Townhouse' || selectedType == 'Mansion' )
                {
                    $('.areasqft').css('display', 'none')
                    $('.bultsqft').css('display', 'block')
                    $('.plotsqft').css('display', 'block')

                }
                else
                {
                    $('.areasqft').css('display', 'block')
                    $('.bultsqft').css('display', 'none')
                    $('.plotsqft').css('display', 'none')

                }

 
            $('.property-type').on('change', function(){
                var selectedType = $('.property-type').find(":selected").val(); 
                if( selectedType == 'Villa' || selectedType == 'Townhouse' || selectedType == 'Mansion' )
                {
                    $('.areasqft').css('display', 'none')
                    $('.bultsqft').css('display', 'block')
                    $('.plotsqft').css('display', 'block')

                }
                else
                {
                    $('.areasqft').css('display', 'block')
                    $('.bultsqft').css('display', 'none')
                    $('.plotsqft').css('display', 'none')

                }
            });
        });

    </script>
@endsection
