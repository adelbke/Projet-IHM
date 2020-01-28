<?php

namespace App;
use App\Image;
use Illuminate\Database\Eloquent\Model;

class Lesion extends Model
{
   protected $table = "lesions";
   protected $guarded = [];

   public function images()
   {
      return $this->hasMany(Image::class);
   }

   public function collection()
   {
      return $this->belongsTo(Collection::class);
   }
}
