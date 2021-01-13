<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->boolean('gender')->default(false);
            $table->string('photo_path')->nullable();
            $table->text('description')->nullable();
            $table->text('description_expert')->nullable();
            $table->unsignedInteger('author_id')->nullable();
            $table->unsignedInteger('moderator_id')->nullable();
            $table->boolean('bad_photos_flag')->default(false);
            $table->boolean('moderated_flag')->default(false);
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
        Schema::dropIfExists('people');
    }
}
