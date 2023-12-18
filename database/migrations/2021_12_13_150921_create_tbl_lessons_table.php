<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('tbl_courses')->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('embed_id')->nullable();
            $table->text('short_text')->nullable();
            $table->text('full_text')->nullable();
            $table->integer('position')->nullable()->unsigned();
            $table->tinyInteger('free_lesson')->nullable()->default(0);
            $table->tinyInteger('published')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
