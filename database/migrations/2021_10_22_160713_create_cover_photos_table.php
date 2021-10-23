<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover_photos', function (Blueprint $table) {
            $table->id();
            $table->string('index_photo');
            $table->string('about_photo');
            $table->string('team_photo');
            $table->string('service_photo');
            $table->string('portfolio_photo');
            $table->string('portfolio_view_photo');
            $table->string('gallery_photo');
            $table->string('gallery_view_photo');
            $table->string('blog_photo');
            $table->string('blog_view_photo');
            $table->string('contact_photo');
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
        Schema::dropIfExists('cover_photos');
    }
}
