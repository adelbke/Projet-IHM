<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = "collections";

    public function lesions()
    {
        return $this->hasMany(Lesion::class);
    }
}
