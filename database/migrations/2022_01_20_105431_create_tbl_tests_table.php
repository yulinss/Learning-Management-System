<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id')->index();
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
            $table->foreign('course_id')->references('id')->on('tbl_courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_tests');
    }
}
