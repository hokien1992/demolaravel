<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tintuc',function(Blueprint $table){
            $table->increments('id');
            $table->string('tieude');
            $table->string('alias');
            $table->string('tomtat');
            $table->string('noidung');
            $table->string('hinhanh');
            $table->string('noibat');
            $table->integer('soluotxem');
            $table->integer('idloaitin');
            $table->timestamps();
            $table->integer('loaitin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('tintuc');
    }
}
