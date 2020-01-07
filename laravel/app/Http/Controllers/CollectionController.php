<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CollectionsRequest;
use App\Collection;
use App\Image;
use App\Lesion;
use App\User;
use Illuminate\Validation\Rule;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }

    public function create()
    {
        $collectionList = Collection::all()->where('user_id','=',auth()->user()->id);
        $collectionList->loadCount('lesions');
        return view('photo',compact('collectionList'));
    }

    public function store(CollectionsRequest $request)
    {
        $data = $request->validate([
            'dx'=>['required','string',Rule::in(['akiec','bcc','bkl','df','mel','nv','vasc'])],
            'dx_type'=>['required','string',Rule::in(['histo','follow-up','consensus','confocal'])],
            'localization'=>['required','string',Rule::in(['abdomen','back','chest','ear','face','foot','genital','hand','lower extremity','neck','scalp','trunk','upper extremity','unknown'])],
            'sex'=>['required','string','in:male,female,other'],
            'age'=>['required','integer','gt:0'],
            'collection'=>['required'],
            'collectionName'=>[Rule::requiredIf($request->input('collection')=='create'),'string'],
            'image'=>['required','array'],
            'image.*'=>['image','required']
		]);
		
		// check if we add to existing colection or create collection

		if($data['collection']=='create'){
			$collection = new Collection();
			$collection->user_id = auth()->user()->id;
			$collection->name ="No Name";
			$collection->save();
		}else{
			$collection = Collection::find($data['collection']);
		}

        // Create the lesion
        $le = new Lesion();

		$le->dx= $data['dx'];
		$le->dx_type = $data['dx_type'];
		$le->localization = $data['localization'];
		$le->sex = $data['sex'];
		$le->age= $data['age'];
		$le->collection_id = $collection->id;
		$le->save();
		foreach($data['image'] as $photo) {
			$im = new Image();
        	$im->path = $photo->store(config('images.path'),'local');
			$im->path = '/storage/'.$im->path;
			$im->lesion_id= $le->id;
			$im->save();
		}
        return view('photo_accepter');


        $Collect = new Collection();
        $le = new Lesion();

         $Collect->user_id =auth()->user()->id;
         $Collect->save();
         $le->collection_id=$Collect->id ;

         $le->dx= $request->input('dx');
         $le->dx_type = $request->input('dx_type');
         $le->localization = $request->input('localization');
         $le->sex = $request->input('sex');
         $le->age= $request->input('age');
         $le->save();
         foreach($request->image as $photo) {
         $im = new Image();
         $im->path = $photo->store(config('images.path'),'local');
         $im->path = '/storage/'.$im->path;
         $im->lesion_id= $le->id;
         $im->save(); }
        return view('photo_accepter');
    }
}
