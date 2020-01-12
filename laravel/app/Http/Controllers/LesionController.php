<?php

namespace App\Http\Controllers;

use App\Lesion;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
<<<<<<< Updated upstream
use App\Collection;
use App\Lesion;
use App\Image;
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
>>>>>>> Stashed changes

class LesionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);

    }

    public function index()
    {
        if(auth()->user()->role == "Admin"){
            $Collection = Collection::all()->where('user_id','=',auth()->user()->id);
            $Lesion = Lesion::all();
            $Image = Image::all();
            return view('lesions.index',compact('Collection','Lesion','Image'));
        }
        if(auth()->user()->role == "SuperAdmin"){
            $Collection = Collection::all();
            $Lesion = Lesion::all();
            $Image = Image::all();

            return view('lesions.superadmin.index',compact('Collection','Lesion','Image'));
        }
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
        
        foreach ($data['dx'] as $key=>$value) {
            if($key == 0){
                $results->Where('dx','=',$value);
            }else{
                $results->orWhere('dx','=',$value);
            }
        }
        
        foreach ($request['dx_type'] as $key=>$value) {
            if($key == 0){
                $results->Where('dx_type','=',$value);
            }else{
                $results->orWhere('dx_type','=',$value);
            }
        }

        foreach ($data['sex'] as $key=>$value) {
            if($key == 0){
                $results->Where('sex','=',$value);
            }else{
                $results->orWhere('sex','=',$value);
            }
        }

        foreach ($data['localization'] as $key=>$value) {
            if($key == 0){
                $results->Where('localization','=',$value);
            }else{
                $results->orWhere('localization','=',$value);
            }
        }

        $results->whereBetween('age',[$data['ageMin'],$data['ageMax']])->paginate(20);

        return view('search',compact('results'));

    }
}
