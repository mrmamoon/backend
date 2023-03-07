@extends('cms.layouts.masterpage')
@section('title', 'users')
@section('top-styles')
<link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/forms/theme-checkbox-radio.css">
<link href="{{ url('') }}/assets/css/components/custom-list-group.css" rel="stylesheet" type="text/css">
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
      <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item">User Management</li>
        <li class="breadcrumb-item"><a href="{{route('role')}}">Roles</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$isEdit ? 'Edit' : 'Add'}}</li>
      </ol>
          
          <form action="{{$isEdit ? route('role.update',[$role->id]) : route('role.store')}}" method="POST">
            @csrf
            @if ($isEdit)
            <input type="hidden" name="_method" value="put">
            @endif
            <div style="background: #294159;">
              <div class="row">
                  <div class="col-md-6 mt15 pl30">
                      <h5 class="text-white">Roles / {{$isEdit ? 'Edit' : 'Add'}}</h5>
                  </div>

                  <div class="col-md-6 text-right">
                      <a href="{{route('role')}}" class="btn btn-danger"> 
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
                <div class="form-group col-md-12">
                  <label for="inputEmail4">Role Name
                  </label>
                  <input type="text" name="name" value="{{ $role->name  ?? null }}" class="form-control" id="inputEmail4" placeholder="Enter Role Name" required>
                </div>
              </div>
              <div class="widget-content widget-content-area">
                <div style="background: #294159;" >
                  <div class="text-left">
                    <h3 class="p-2 mb-4 mr-4 ml-3 mt-2 text-white">Permissions
                    </h3>
                  </div>
                </div>
                <div class="container-fluid">
                  <div class="row">
                    @foreach ($menus as $parentMenus)  
                    @if($parentMenus->parent_id == 0)     
                    <div class="col-xl-3 col-lg-3 col-sm-3  layout-spacing">
                      <div class="card component-card_2">
                        <div class="">
                          <ul class="list-group task-list-group ">
                            <li class="list-group-item parent-menu" style="background-color: #294159;">
                              <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-dark w-100 justify-content-between">
                                  <input id="{{$parentMenus->name}}" type="checkbox" 
                                  {{$isEdit && in_array($parentMenus->name,$rolesPermissions) ? 'checked' : '' }} 
                                   value="{{$parentMenus->id}}"   name="permission[]" class="new-control-input">
                                  <span class="new-control-indicator">
                                  </span>
                                    <span  class="text-white"><span>{{$parentMenus->name}}<span></span>
                                </label>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div class="card-body">
                            @foreach ($menus as $subMenus)  
                            @if ($subMenus->parent_id == $parentMenus->id)
                              @php
                                $explodedMenuName = explode('-',$subMenus->name);
                              @endphp
                            <ul class="list-group task-list-group ">
                              <li class="list-group-item parent-menu mt-3" style="background-color: #294159;">
                                <div class="n-chk">
                                  <label class="new-control new-checkbox checkbox-dark w-100 justify-content-between">
                                    <input value="{{$subMenus->id}}" type="checkbox" 
                                    {{$isEdit && in_array($subMenus->name,$rolesPermissions) ? 'checked' : '' }}  name="permission[]" class="new-control-input">
                                    <span class="new-control-indicator">
                                    </span>
                                    <span class="ml-2 text-white">
                                      {{ $explodedMenuName[1] ?? $subMenus->name }} 
                                    </span>
                                  </label>
                                </div>
                              </li>
                            </ul>
                          <ul class="list-group task-list-group">
                          @foreach ($menus as $permission)  
                            @if ($permission->parent_id == $subMenus->id)
                            @php
                              $explodedRoleName = explode('-',$permission->name);
                            @endphp
                            <li class="list-group-item">
                              <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-dark w-100 justify-content-between">
                                  <input type="checkbox"  
                                  {{$isEdit && in_array($permission->name,$rolesPermissions) ? 'checked' : '' }}
                                   value="{{$permission->id}}" name="permission[]" class="new-control-input">
                                  <span class="new-control-indicator">
                                  </span>
                                  <span class="ml-2">
                                    {{$explodedRoleName[1] }}
                                  </span>
                                </label>
                              </div>
                            </li>
                            @endif
                          @endforeach
                          </ul>
                          @endif
                          @endforeach
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
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
</div>
<!--  END CONTENT AREA  -->
@endsection
@section('bottom-mid-scripts')
<script src="https://parsleyjs.org/dist/parsley.min.js"></script>

@endsection
@section('bottom-bot-scripts')
<script>
  $(document).ready(function() {
      $('form').parsley();
  });
</script>
@endsection
