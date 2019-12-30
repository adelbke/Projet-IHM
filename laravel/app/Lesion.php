<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesion extends Model
{
   protected $table = "lesions";

   public function images()
   {
      return $this->hasMany(Image::class);
   }

   public function collection()
   {
      return $this->belongsTo(Collection::class);
   }
}
