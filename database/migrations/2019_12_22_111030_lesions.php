<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lesions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('collection_id');
            $table->enum('dx',['akiec','bcc','bkl','df','mel','nv','vasc']);
            $table->enum('dx_type',['histo','follow-up','consensus','confocal']);
            $table->enum('localization',['abdomen','back','chest','ear','face','foot','genital','hand','lower extremity','neck','scalp','trunk','upper extremity','unknown']);
            $table->enum('sex',['male','female','unknown']);
            $table->unsignedInteger('age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesions');
    }
}
