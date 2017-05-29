<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\QueryException;

class TableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->integer('soluong');
            $table->timestamps();
        //
        if (Schema::hasTable('product')) {

            //
        });
    //
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('product');

    }

}
