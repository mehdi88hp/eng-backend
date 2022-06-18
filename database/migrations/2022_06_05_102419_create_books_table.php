<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title_fa');
            $table->string('title_en');
            $table->text('description_fa');
            $table->text('description_en');
            $table->json('author'); // should be a many to many relation
            $table->json('categories');// should be a many to many relation
            $table->unsignedInteger('publisher');// should be a relation
            $table->unsignedInteger('cefr_id');// should be a relation
            $table->unsignedSmallInteger('pages');
            $table->unsignedMediumInteger('duration');
            $table->timestamp('release_date');
            $table->text('image_path');
            $table->string('image_name');
            $table->timestamps();

            $table->foreign('cefr_id')
                ->references('id')->on('cefr')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
