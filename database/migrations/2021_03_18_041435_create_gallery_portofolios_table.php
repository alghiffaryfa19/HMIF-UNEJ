<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryPortofoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_portofolios', function (Blueprint $table) {
            $table->id();
            $table->string('caption');
            $table->text('photo');
            $table->unsignedBigInteger('portofolio_id');
            $table->foreign('portofolio_id')->references('id')->on('portofolios')->onDelete('cascade');
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
        Schema::dropIfExists('gallery_portofolios');
    }
}
