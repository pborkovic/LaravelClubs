<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaguesTable extends Migration
{
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->date('established_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leagues');
    }
}
