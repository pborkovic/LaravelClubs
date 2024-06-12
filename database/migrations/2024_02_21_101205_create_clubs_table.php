<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('clubs', function (Blueprint $table) {
            // the primary key is always the id
            $table->id('id');

            // initializition of fields
            $table->string('name', 30)->nullable(false);
            $table->char('country', 30)->nullable(false);
            $table->smallInteger('number_of_titles')->unsigned();
            $table->unsignedBigInteger('league_id'); // new foreign key field
            $table->year('founding_year')->nullable(false);
            $table->string('stadium', 50)->nullable(false);
            $table->string('coach', 50)->nullable(false);
            $table->string('captain', 50)->nullable(false);
            $table->integer('current_value')->unsigned()->nullable(false);
            $table->string('colors', 50)->nullable();
            $table->text('description')->nullable();
            $table->float('avg_goals')->nullable();
            $table->boolean('is_champion')->default(0);
            $table->unsignedBigInteger('avg_attendance')->nullable();

            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
