<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iduser');
            $table->integer('idtintuc');
            $table->string('noidung');
            $table->timestamps();
            $table->integer('tintuc_id');
            //
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
        Schema::drop('comment');
    }
}
