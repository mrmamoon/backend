<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use App\Models\Developers;
use App\Models\Amenities;
use App\Models\Projects_To_Amenities;
use App\Models\Project_Images;
use App\Models\propertyType;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ProjectsController extends Controller
{
    public function index()
    {
        $data = [

            'developers'    => Developers::get(),
        ];
        return view('cms.projects.index', $data);
    }

    public function datatableAmenities()
    {
        $amenities = Amenities::get();

        return DataTables::collection($amenities)->toJson();
    }

    public function datatable()
    {
         $projects = Projects::where('status', 'New Project')->orderByDesc('id')->get();
        //$projects = Projects::with('developers');


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

        return view('cms.projects.add', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'featured_image' => 'required|image|dimensions:min_width=800,min_height=600,max_width=800,max_height=600',
        ]);

        // dd($request->agent_img);
        $t_id = propertyType::where('type', $request->type)->first();
        
        $projects         =   new Projects;

        $image = Storage::disk('cms')->putFile('', $request->featured_image);
        $projects->featured_image  =   $image;
        $bimage = Storage::disk('cms')->putFile('', $request->bannar_image);
        $projects->bannar_image  =   $bimage;
        // $agentImage = Storage::disk('cms')->putFile('', $request->agent_img);
        $projects->agent_image  =   $request->agent_img;

   
        $projects->title                  =   $request->name;
        $projects->agent_name             =   $request->agent_name;
        $projects->developer_id           =   $request->network_id;
        $projects->bedrooms               =   $request->bedrooms;
        $projects->price                  =   str_replace(',', '', $request->price);
        $projects->url                    =   $request->url;
        $projects->bathrooms              =   $request->bathrooms;
        $projects->type                   =   $request->type;
        $projects->ref_id                 =   $t_id->code.'S-'.$projects->id;
        $projects->area                   =   $request->area;
        $projects->built_area                   =   $request->builtArea;
        $projects->plot_area                   =   $request->plotArea;
        $projects->guests                 =   $request->guests;
        $projects->phone                  =   $request->phone;
        $projects->email                  =   $request->email;
        $projects->seo_title              =   $request->seo_title;
        $projects->meta_description       =   $request->meta_description;
        $projects->meta_keywords          =   $request->meta_keywords;
        $projects->featured               =   $request->featured;

        $projects->property_status        =   $request->property_status;
        $projects->nearest_hospitals      =   $request->nearby_hospitals;
        $projects->nearest_schools        =   $request->nearby_schools;
        $projects->nearest_shopping_malls =   $request->nearby_shopping_malls;
        $projects->nearest_gyms           =   $request->nearby_gyms;
        $projects->amenities              =   $request->amenities;
        $projects->slug                   =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $projects->description            =   $request->description;
        $projects->ext_ref_num            =   $request->ext_ref_num;
        $projects->permit_no            =   $request->permit_no;

        $projects->status                 =   'New Project';
            $img = '';

        if($request->has('multi_images')){
            foreach($request->multi_images as $gallery_img){
                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $img .=$imageName.",";
            }
        }
        $projects->images  =  $img;

        $projects->save();
        $projects->ref_id   =   $t_id->code.'S-'.$projects->id;
        $projects->save();
        // if($request->amenities != "")
        // {
        //     foreach($request->amenities as $key => $amenities)
        //     {
        //         $projects_to_amenities                 =   new Projects_To_Amenities;
        //         $projects_to_amenities->project_id     =   $projects->id;
        //         $projects_to_amenities->amenity_id     =   $amenities;
        //         $projects_to_amenities->save();
        //     }
        // }

        return redirect()->route('projects');
    }


    public function edit(Projects $projects)
    {
        $data = [
            'isEdit'                => true,
            'projects'    => $projects,
            'amenities'    =>  Amenities::get(),
            'developers'    => Developers::get(),
            'types' => propertyType::get(),
        ];

        // return $data['blogs'];

        return view('cms.projects.add', $data);
    }

    public function update(Request $request, Projects $projects)
    {
        $request->validate([
            'name' => 'required',
        ]); 
        if($request->type){
        $t_id = propertyType::where('type', $request->type)->first();
        $projects->ref_id   =   $t_id->code.'S-'.$projects->id;
        }
        if($request->featured_image){
            $image = Storage::disk('cms')->putFile('', $request->featured_image);
            $projects->featured_image  =   $image;
        }
        if($request->bannar_image){
            $bimage = Storage::disk('cms')->putFile('', $request->bannar_image);
            $projects->bannar_image  =   $bimage;
        }
        if($request->agent_img){
            // $agentImage = Storage::disk('cms')->putFile('', $request->agent_img);
            // $projects->agent_image  =   $agentImage;
            $projects->agent_image  =   $request->agent_img;
        }
        


        $projects->title                  =   $request->name;
        $projects->agent_name             =   $request->agent_name;
        $projects->developer_id           =   $request->network_id;
        $projects->bedrooms               =   $request->bedrooms;
        $projects->price                  =   $request->price ? str_replace(',', '', $request->price) : null;
        $projects->url                    =   $request->url;
        $projects->bathrooms              =   $request->bathrooms;
        $projects->type                   =   $request->type;
        $projects->area                   =   $request->area;
        $projects->built_area                   =   $request->builtArea;
        $projects->plot_area                   =   $request->plotArea;
        $projects->guests                 =   $request->guests;
        $projects->phone                  =   $request->phone;
        $projects->email                  =   $request->email;
        $projects->seo_title              =   $request->seo_title;
        $projects->meta_description       =   $request->meta_description;
        $projects->meta_keywords          =   $request->meta_keywords;
        $projects->featured               =   $request->featured;
        $projects->property_status        =   $request->property_status;
        $projects->slug                   =   strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $projects->description            =   $request->description;
        $projects->ext_ref_num            =   $request->ext_ref_num;
        $projects->permit_no              =   $request->permit_no;
        $projects->nearest_hospitals      =   $request->nearby_hospitals;
        $projects->nearest_schools        =   $request->nearby_schools;
        $projects->nearest_shopping_malls =   $request->nearby_shopping_malls;
        $projects->nearest_gyms           =   $request->nearby_gyms;
        $projects->amenities              =   $request->amenities;
        

        if($request->has('multi_images')){
            $img = '';
            foreach($request->multi_images as $gallery_img){
                $imageName = Storage::disk('cms')->putFile('', $gallery_img);
                $img .=$imageName.",";
            }
            $projects->images  .=  $img;
        }
        

        $projects->save();
        if($t_id){
            $projects->ref_id   =   $t_id->code.'S-'.$projects->id;
            $projects->save();
        }
        
        // if($request->amenities != "")
        // {
        //     foreach($request->amenities as $key => $amenities)
        //     {
        //         $projects_to_amenities                 =   new Projects_To_Amenities;
        //         $projects_to_amenities->project_id     =   $projects->id;
        //         $projects_to_amenities->amenity_id     =   $amenities;
        //         $projects_to_amenities->save();
        //     }
        // }

        return redirect()->route('projects');
    }

    public function destroy(Request $request)
    {
        $project = Projects::where('id', $request->deleteId)->first();
        Projects_To_Amenities::where('project_id', $request->deleteId)->delete();
        $images = explode(',', $project->images);
        Storage::disk('cms')->delete($images);
        $project->delete();
        // return $request;
        return response()->json($project, 200);
    }

    public function status(Request $request)
    {

        $status = $request->status;
        $id = $request->id;

        $item = Projects::find($id);
        // if($item->status == 'pending'){
        //     $item->status = 'approved';
        //     $item->save();
        // }
        // else{
        //     $item->status = 'pending';
        //     $item->save();
        // }
        if ($item->update(['featured' => $status])) {
            $response['featured'] = true;
            $response['message'] = 'Status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    public function publish(Request $request)
    {

        $publish = $request->publish;
        $id = $request->id;

        $item = Projects::find($id);
        // if($item->status == 'pending'){
        //     $item->status = 'approved';
        //     $item->save();
        // }
        // else{
        //     $item->status = 'pending';
        //     $item->save();
        // }
        if ($item->update(['published' => $publish])) {
            $response['published'] = true;
            $response['message'] = 'Published status Updated Successfully!';

            return response()->json($response, 200);
        }
    }

    public function deleteImage(Request $request)
    {

        // $status = $request->status;
        $id = $request->projectId;
        $image = $request->image;

        $item = Projects::find($id);
        $newImages = str_replace($image.',',"",$item->images);
        // $newImages = trim($item->images, $image.',');
        $item->images = $newImages;
        if($item->save())
        {return response()->json($item, 200);}

        // if ($item->update(['images' => $newImages])) {
        //     $response['featured'] = true;
        //     $response['message'] = 'Status Updated Successfully!';

        //     return response()->json($response, 200);
        // }
    }

}
// d7Y5ONGCeXaTmbWA0QUKwIGMQvXUVGJmDQHyiPc5.png,Cuut9rKXHuZsi924xen8UGva2uWcgwqXRT78FEpq.png,KpOmHDAnpxV5SPC9qjzeQprm75mmRkfbO19IZDmI.png,03hE8liKCfXxuh3cXaG8brrDxI4FLviEVhqUQK3f.png,
// d7Y5ONGCeXaTmbWA0QUKwIGMQvXUVGJmDQHyiPc5.png,Cuut9rKXHuZsi924xen8UGva2uWcgwqXRT78FEpq.png,KpOmHDAnpxV5SPC9qjzeQprm75mmRkfbO19IZDm