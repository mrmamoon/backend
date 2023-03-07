<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\propertyPricePerSqft;
use App\Models\propertySalesValue;
use App\Models\topPerformingAreas;
use App\Jobs\CsvInsert;
use App\Models\insight_tables;


class insightsController extends Controller
{

    public function index()
    {
        $data = [
            // 'developers' => Developers::get(),
        ];
        
        return view('cms.insights.index', $data);
    }


//price per sqft start

    public function datatable_property_Price_Per_Sqft()
    {
        $property_Price_Per_Sqft = propertyPricePerSqft::get();

        return DataTables::collection($property_Price_Per_Sqft)->toJson();

    }

    public function create_property_Price_Per_Sqft()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.insights.add_property_Price_Per_Sqft', $data);
    }

    public function store_property_Price_Per_Sqft(Request $request)
    {
        // return $request;

        $request->validate([
            'year' => 'required',
        ]);

        $property_Price_Per_Sqft         =   new propertyPricePerSqft;

        $property_Price_Per_Sqft->year                     =   $request->year;
        $property_Price_Per_Sqft->january                  =   $request->january;
        $property_Price_Per_Sqft->february                 =   $request->february;
        $property_Price_Per_Sqft->march                    =   $request->march;
        $property_Price_Per_Sqft->april                    =   $request->april;
        $property_Price_Per_Sqft->may                      =   $request->may;
        $property_Price_Per_Sqft->june                     =   $request->june;
        $property_Price_Per_Sqft->july                     =   $request->july;
        $property_Price_Per_Sqft->august                   =   $request->august;
        $property_Price_Per_Sqft->september                =   $request->september;
        $property_Price_Per_Sqft->october                  =   $request->october;
        $property_Price_Per_Sqft->november                 =   $request->november;
        $property_Price_Per_Sqft->december                 =   $request->december;
        $property_Price_Per_Sqft->save();

        return redirect()->route('insights');
        
    }

    public function edit_property_Price_Per_Sqft(propertyPricePerSqft $property_Price_Per_Sq)
    {
        $data = [
            'isEdit'                => true,
            'property_Price_Per_Sq'    => $property_Price_Per_Sq,
        ];

        // return $data['brand'];

        return view('cms.insights.add_property_Price_Per_Sqft', $data);
    }

    public function update_property_Price_Per_Sqft(Request $request, propertyPricePerSqft $property_Price_Per_Sq)
    {

        $property_Price_Per_Sq->year                     =   $request->year;
        $property_Price_Per_Sq->january                  =   $request->january;
        $property_Price_Per_Sq->february                 =   $request->february;
        $property_Price_Per_Sq->march                    =   $request->march;
        $property_Price_Per_Sq->april                    =   $request->april;
        $property_Price_Per_Sq->may                      =   $request->may;
        $property_Price_Per_Sq->june                     =   $request->june;
        $property_Price_Per_Sq->july                     =   $request->july;
        $property_Price_Per_Sq->august                   =   $request->august;
        $property_Price_Per_Sq->september                =   $request->september;
        $property_Price_Per_Sq->october                  =   $request->october;
        $property_Price_Per_Sq->november                 =   $request->november;
        $property_Price_Per_Sq->december                 =   $request->december;
        $property_Price_Per_Sq->save();

        return redirect()->route('insights');
    }

    public function destroy_property_Price_Per_Sqft(Request $request)
    {
        $property_Price_Per_Sq = propertyPricePerSqft::where('id', $request->deleteId)->first();
        // Storage::disk('cms')->delete('', $developers->imagesmenu);
        // Storage::disk('cms')->delete('', $developers->logo);
        $property_Price_Per_Sq->delete();
        // return $request;
        return response()->json($property_Price_Per_Sq, 200);
    }
//price per sqft end

//property sales value start


    public function datatable_property_sales_value()
    {
        $property_sales_value = propertySalesValue::get();

        return DataTables::collection($property_sales_value)->toJson();

    }

    public function create_property_sales_value()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.insights.add_property_sales_value', $data);
    }

    public function store_property_sales_value(Request $request)
    {
        // return $request;

        $request->validate([
            'year' => 'required',
        ]);

        $propertySalesValue                           =   new propertySalesValue;

        $propertySalesValue->year                     =   $request->year;
        $propertySalesValue->january                  =   $request->january;
        $propertySalesValue->february                 =   $request->february;
        $propertySalesValue->march                    =   $request->march;
        $propertySalesValue->april                    =   $request->april;
        $propertySalesValue->may                      =   $request->may;
        $propertySalesValue->june                     =   $request->june;
        $propertySalesValue->july                     =   $request->july;
        $propertySalesValue->august                   =   $request->august;
        $propertySalesValue->september                =   $request->september;
        $propertySalesValue->october                  =   $request->october;
        $propertySalesValue->november                 =   $request->november;
        $propertySalesValue->december                 =   $request->december;
        $propertySalesValue->save();

        return redirect()->route('insights');
        
    }

    public function edit_property_sales_value(propertySalesValue $propertySalesValue)
    {
        $data = [
            'isEdit'                => true,
            'propertySalesValue'    => $propertySalesValue,
        ];

        // return $data['brand'];

        return view('cms.insights.add_property_sales_value', $data);
    }

    public function update_property_sales_value(Request $request, propertySalesValue $propertySalesValue)
    {

        $propertySalesValue->year                     =   $request->year;
        $propertySalesValue->january                  =   $request->january;
        $propertySalesValue->february                 =   $request->february;
        $propertySalesValue->march                    =   $request->march;
        $propertySalesValue->april                    =   $request->april;
        $propertySalesValue->may                      =   $request->may;
        $propertySalesValue->june                     =   $request->june;
        $propertySalesValue->july                     =   $request->july;
        $propertySalesValue->august                   =   $request->august;
        $propertySalesValue->september                =   $request->september;
        $propertySalesValue->october                  =   $request->october;
        $propertySalesValue->november                 =   $request->november;
        $propertySalesValue->december                 =   $request->december;
        $propertySalesValue->save();

        return redirect()->route('insights');
    }

    public function destroy_property_sales_value(Request $request)
    {
        $propertySalesValue = propertySalesValue::where('id', $request->deleteId)->first();
        // Storage::disk('cms')->delete('', $developers->imagesmenu);
        // Storage::disk('cms')->delete('', $developers->logo);
        $propertySalesValue->delete();
        // return $request;
        return response()->json($propertySalesValue, 200);
    }

//property sales value end

//top performing areas start

    public function datatable_top_performing_areas()
    {
        $property_sales_value = topPerformingAreas::limit(5)->orderBy('rank','asc')->get();

        return DataTables::collection($property_sales_value)->toJson();

    }

    public function create_top_performing_areas()
    {
        $data = [
            'isEdit' => false,
        ];

        return view('cms.insights.add_top_performing_areas', $data);
    }

    public function store_top_performing_areas(Request $request)
    {
        // return $request;

        $request->validate([
            'year' => 'required',
        ]);

        $topPerformingAreas         =   new topPerformingAreas;

        $topPerformingAreas->area_name               =   $request->year;
        $topPerformingAreas->popularity              =   $request->january;
        $topPerformingAreas->save();

        return redirect()->route('insights');
        
    }

    public function edit_top_performing_areas(topPerformingAreas $topPerformingAreas)
    {
        $data = [
            'isEdit'                => true,
            'topPerformingAreas'    => $topPerformingAreas,
        ];

        // return $data['brand'];

        return view('cms.insights.add_top_performing_areas', $data);
    }

    public function update_top_performing_areas(Request $request, topPerformingAreas $topPerformingAreas)
    {

        $topPerformingAreas->area_name               =   $request->year;
        $topPerformingAreas->popularity              =   $request->january;
        $topPerformingAreas->save();

        return redirect()->route('insights');
    }

    public function destroy_top_performing_areas(Request $request)
    {
        $topPerformingAreas = topPerformingAreas::where('id', $request->deleteId)->first();
        // Storage::disk('cms')->delete('', $developers->imagesmenu);
        // Storage::disk('cms')->delete('', $developers->logo);
        $topPerformingAreas->delete();
        // return $request;
        return response()->json($topPerformingAreas, 200);
    }

//  Insert CSV

    public function csvTest(Request $request){

        if ($request->file('fileImport') == '') {
            return "errpr";
        }  
        $file = $request->file('fileImport');

      // File Details 
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $fileNameForTable = trim($filename, '.'.$extension);
      // Valid File Extensions
        $valid_extension = array("csv");

          // File upload location
        $location = 'uploads';

          // Upload file
        $file->move($location,$filename);

          // Import CSV to Database
        $filepath = public_path($location."/".$filename);

          // Reading file
        $file = fopen($filepath,"r");

        $importData_arr = [];
        $importColumns_arr = [];
        $i = 0;

        while (($filedata = fgetcsv($file, 10000000, ",")) !== FALSE) {
            $num = count($filedata );
             
             // Skip first row (comment if you want to skip the first row)
            if($i == 0){
                for ($c=0; $c < $num; $c++) {
                $importColumns_arr[$i][] = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '_', $filedata [$c])));
                }
                $i++;
                continue; 
            }
            for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
        }
        fclose($file);

        dispatch(new CsvInsert($importData_arr, $importColumns_arr, $fileNameForTable, $request->key));

        return redirect()->route('insights')->with('message','Import Successful.');
    }
}
