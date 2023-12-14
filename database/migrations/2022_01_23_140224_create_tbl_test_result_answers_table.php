<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTestResultAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_test_result_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('test_result_id')->nullable();
            $table->unsignedBigInteger('question_id')->nullable();
            $table->unsignedBigInteger('question_option_id')->nullable();
            $table->tinyInteger('correct')->default(0);
            $table->timestamps();
            $table->foreign('test_result_id')->references('id')->on('tbl_test_results')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('tbl_questions')->onDelete('cascade');
            $table->foreign('question_option_id')->references('id')->on('tbl_question_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_test_result_answers');
    }
}
