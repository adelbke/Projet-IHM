<?php

namespace App\Http\Controllers;

use App\Image;
use App\Lesion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SearchController extends Controller
{
    //

    public function search(Request $request)
    {

        // formatting the request
        $input = $request->all();
        $request['dx'] = explode(',',$input['dx']);
        $request['dx_type'] = explode(',',$input['dx_type']);
        $request['localization'] = explode(',',$input['localization']);
        $request['sex'] = explode(',',$input['sex']);

        // dd($request);

        $data = $request->validate([
            'dx'=>['array'],
            'dx_type'=>['array'],
            'localization'=>['array'],
            'sex'=>['array'],
            'ageMax'=>['Numeric','max:120','min:1','gte:ageMin'],
            'ageMin'=>['Numeric','max:120','min:1','lte:ageMax'],
            'dx.*'=>['string',Rule::in(['akiec','bcc','bkl','df','mel','nv','vasc'])],
            'dx_type.*'=>['string',Rule::in(['histo','follow-up','consensus','confocal'])],
            'localization.*'=>['string',Rule::in(['abdomen','back','chest','ear','face','foot','genital','hand','lower extremity','neck','scalp','trunk','upper extremity','unknown'])],
            'sex.*'=>['string',Rule::in(['male','female','unknown'])]
        ]);

        // dd($request);


        $results = Lesion::with(['images']);

        // dd($data['dx']);
        
        if($data['dx'] != [""]){
            foreach ($data['dx'] as $key=>$value) {
                if($key == 0){
                    $results->Where('dx','=',$value);
                }else{
                    $results->orWhere('dx','=',$value);
                }
            }
        }
        
        if($data['dx_type'] != [""]){
            foreach ($request['dx_type'] as $key=>$value) {
                if($key == 0){
                    $results->Where('dx_type','=',$value);
                }else{
                    $results->orWhere('dx_type','=',$value);
                }
            }
        }

        if($data['sex'] != [""]){
            foreach ($data['sex'] as $key=>$value) {
                if($key == 0){
                    $results->Where('sex','=',$value);
                }else{
                    $results->orWhere('sex','=',$value);
                }
            }
        }

        if($data['localization'] != [""]){
            foreach ($data['localization'] as $key=>$value) {
                if($key == 0){
                    $results->Where('localization','=',$value);
                }else{
                    $results->orWhere('localization','=',$value);
                }
            }
        }

        $results->whereBetween('age',[$data['ageMin'],$data['ageMax']]);

        // dd($results->paginate(20));
        // dd($request->getRequestUri());
        $results = $results->paginate(8)->onEachSide(1)->withPath($request->getRequestUri());
        // $results = $results->paginate(8)->


        return view('search',compact('results'));

    }

    public function viewLesionImages($id)
    {
        $list = Image::where('lesion_id','=',$id)->get();
        $lesion =collect(Lesion::findOrFail($id));
        unset($lesion["id"]);
        unset($lesion["collection_id"]);
        unset($lesion["created_at"]);   
        unset($lesion["updated_at"]);
        $lesion['dx']= config('global.lesion_dx')[$lesion['dx']];
        $lesion['dx_type']= config('global.lesion_dx_type')[$lesion['dx_type']];
        $lesion['localization']= config('global.lesion_localization')[$lesion['localization']];
        $lesion['sex']= config('global.lesion_sex')[$lesion['sex']];

        return view('Image.searchImageList',compact('list','lesion'));
    }
}
