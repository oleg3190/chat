<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloadables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('download_id');
            $table->unsignedBigInteger('downloadable_id');
            $table->string('downloadable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('downloadables');
    }
}
