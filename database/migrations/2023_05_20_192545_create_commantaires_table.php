<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommantairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commantaires', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Email');
            $table->string('Detail_comm');
            $table->unsignedBigInteger('Cour_id');
            $table->foreign('Cour_id')->references('id')->on('cours')->onDelete('cascade');
            $table->unsignedBigInteger('User_id')->nullable();
            $table->foreign('User_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('cours', function (Blueprint $table) {
            $table->dropForeign(['Cour_id']);
             $table->dropColumn('Cour_id');
             $table->dropForeign(['User_id']);
             $table->dropColumn('User_id');
         });
    }
}
