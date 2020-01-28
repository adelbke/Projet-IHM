<?php

namespace App\Http\Controllers;

use App\Lesion;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use App\Collection;
use App\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class LesionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);

    }

    public function show($id)
    {

            $Collection = Collection::findOrFail($id);
            $Lesion = Lesion::with("images")->where('collection_id','=',$Collection->id)->paginate(4)->onEachSide(1);



            return view('lesions.lesionsList',compact('Lesion'));

    }

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
        $results->paginate(20);

        return view('search',compact('results'));

    }
}
