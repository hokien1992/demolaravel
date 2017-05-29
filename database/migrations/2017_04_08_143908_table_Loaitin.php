<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableLoaitin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('loaitin',function(Blueprint $table){
            $table->increments('id');
            $table->integer('idTheloai');
            $table->string('ten');
            $table->string('alias');
            $table->timestamps();
            $table->integer('theloai_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loaitin');
    }
}
