<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\Developers;
use App\Models\Amenities;
use App\Models\Properties_To_Amenities;
use App\Models\Propertiy_Images;
use App\Models\propertyType;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Projects;

class RentPropertiesController extends Controller
{
    public function index()
    {
        $data = [

            'developers'    => Developers::get(),
        ];
        return view('cms.rent.index', $data);
    }

    public function datatableAmenities()
    {
        $amenities = Amenities::get();

        return DataTables::collection($amenities)->toJson();

    }

    public function datatable()
    {
        $projects = Projects::where("status", "Rent")->orderByDesc('id')->get();
        return DataTables::collection($projects)->toJson();
    }

    public function create()
    {
        $data = [
            'isEdit'    =>  false,
            'amenities'    =>  Amenities::get(),
            'developers'    => Developers::get(),
            'types' => propertyType::get(),
        ];

        return view('cms.rent.add', $data);
    }

    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required',
        ]);
        $t_id = propertyType::where('type', $request->type)->first();
        
        $projects         =   new Projects;

        $image = Storage::disk('cms')->putFile('', $request->featured_image);
        $projects->featured_image  =   $image;
        $bimage = Storage::disk('cms')->putFile('', $request->bannar_image);
        $projects->bannar_image  =   $bimage;
        // $agentImage = Storage::disk('cms')->putFile('', $request->agent_img);
        // $projects->agent_image  =   $agentImage;
        $projects->agent_image  =   $request->agent_img;

        $projects->built_area                   =   $request->builtArea;

        $projects->plot_area                   =   $request->plotArea;



        $projects->title              =   $request->name;
        $projects->agent_name         =   $request->agent_name;
        $projects->developer_id       =   $request->network_id;
        $projects->bedrooms           =   $request->bedrooms;
        $projects->price              =   $request->price ? str_replace(',', '', $request->price) : null;
        $projects->url                =   $request->url;
        $projects->bathrooms          =   $request->bathrooms;
        $projects->type               =   $request->type;
        $projects->area               =   $request->area;
        $projects->guests             =   $request->guests;
        $projects->phone              =   $request->phone;
        $projects->email              =   $request->email;
        $projects->seo_title          =   $request->seo_title;
        $projects->meta_description   =   $request->meta_description;
        $projects->meta_keywords      =   $request->meta_keywords;
        $projects->featured           =   $request->featured;
        $projects->slug               =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $projects->description        =   $request->description;
        $projects->status             =   "Rent";
        $projects->ref_id             =   $t_id->code.'R-'.$projects->id;
        $projects->ext_ref_num        =   $request->ext_ref_num;
        $projects->permit_no      =   $request->permit_no;
        $projects->nearest_hospitals    =   $request->nearby_hospitals;
        $projects->nearest_schools      =   $request->nearby_schools;
        $projects->nearest_shopping_malls =   $request->nearby_shopping_malls;
        $projects->nearest_gyms         =   $request->nearby_gyms;
        $projects->amenities         =   $request->amenities;
        $img = '';

        if($request->has('multi_images')){
            foreach($request->multi_images as $gallery_img){
                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $img .=$imageName.",";
            }
        }
        $projects->images  =  $img;

        $projects->save();
        $projects->ref_id   =   $t_id->code.'R-'.$projects->id;

        $projects->save();

        // if($request->amenities != "")
        // {
        //     foreach($request->amenities as $key => $amenities)
        //     {
        //         $projects_to_amenities                  =   new Properties_To_Amenities;
        //         $projects_to_amenities->property_id     =   $projects->id;
        //         $projects_to_amenities->amenity_id      =   $amenities;
        //         $projects_to_amenities->save();
        //     }
        // }

        return redirect()->route('rent');
    }

    public function edit(Projects $project)
    {
        $data = [
            'isEdit'                => true,
            'project'    => $project,
            'amenities'    =>  Amenities::get(),
            'developers'    => Developers::get(),
            'types' => propertyType::get(),
        ];

        // return $data['blogs'];

        return view('cms.rent.add', $data);
    }

    public function update(Request $request, Projects $project)
    {
        $request->validate([
            'name' => 'required',
        ]); 
        if($request->type){
        $t_id = propertyType::where('type', $request->type)->first();
        $project->ref_id   =   $t_id->code.'R-'.$project->id;
        }
        if($request->featured_image){
            $image = Storage::disk('cms')->putFile('', $request->featured_image);
            $project->featured_image  =   $image;
        }
        if($request->bannar_image){
            $bimage = Storage::disk('cms')->putFile('', $request->bannar_image);
            $project->bannar_image  =   $bimage;
        }
        if($request->agent_img){
            // $agentImage = Storage::disk('cms')->putFile('', $request->agent_img);
            // $project->agent_image  =   $agentImage;
            $project->agent_image  =   $request->agent_img;
        }
        

        $project->built_area                   =   $request->builtArea;

        $project->plot_area                   =   $request->plotArea;


        $project->title              =   $request->name;
        $project->agent_name         =   $request->agent_name;
        $project->developer_id       =   $request->network_id;
        $project->bedrooms           =   $request->bedrooms;
        $project->price              =   $request->price ? str_replace(',', '', $request->price) : null;
        $project->url                =   $request->url;
        $project->bathrooms          =   $request->bathrooms;
        $project->type               =   $request->type;
        $project->area               =   $request->area;
        $project->guests             =   $request->guests;
        $project->phone              =   $request->phone;
        $project->email              =   $request->email;
        $project->seo_title          =   $request->seo_title;
        $project->meta_description   =   $request->meta_description;
        $project->meta_keywords      =   $request->meta_keywords;
        $project->featured           =   $request->featured;
        $project->slug               =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $project->description        =   $request->description;
        $project->ext_ref_num       =   $request->ext_ref_num;
        $project->permit_no      =   $request->permit_no;
        $project->nearest_hospitals    =   $request->nearby_hospitals;
        $project->nearest_schools      =   $request->nearby_schools;
        $project->nearest_shopping_malls =   $request->nearby_shopping_malls;
        $project->nearest_gyms         =   $request->nearby_gyms;
        $project->amenities         =   $request->amenities;

        if($request->has('multi_images')){
            $img = '';
            foreach($request->multi_images as $gallery_img){
                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $img .=$imageName.",";
            }
            $project->images  .=  $img;
        }
        

        $project->save();
        if($t_id){
            $project->ref_id   =   $t_id->code.'R-'.$project->id;
            $project->save();
        }
        
        // if($request->amenities != "")
        // {
        //     foreach($request->amenities as $key => $amenities)
        //     {
        //         $projects_to_amenities                  =   new Properties_To_Amenities;
        //         $projects_to_amenities->property_id     =   $project->id;
        //         $projects_to_amenities->amenity_id      =   $amenities;
        //         $projects_to_amenities->save();
        //     }
        // }

        return redirect()->route('rent');
    }



    public function destroy(Request $request)
    {
        $project = Projects::where('id', $request->deleteId)->first();
        Properties_To_Amenities::where('property_id', $request->deleteId)->delete();
        $images = explode(',', $project->images);
        Storage::disk('cms')->delete($images);
        $project->delete();
        // return $request;
        return response()->json($project, 200);
    }
}
