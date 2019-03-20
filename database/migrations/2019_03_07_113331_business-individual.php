<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BusinessIndividual extends Migration
{
    public function up()
    {
        Schema::create('business-individual', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('business-id', 255);
            $table->string('individual-id', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('business-individual');
    }
}
