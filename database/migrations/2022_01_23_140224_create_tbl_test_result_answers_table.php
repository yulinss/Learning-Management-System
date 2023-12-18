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
            $table->id();
            $table->foreignId('test_result_id')->nullable()->constrained('tbl_test_results')->cascadeOnDelete();
            $table->foreignId('question_id')->nullable()->constrained('tbl_questions')->cascadeOnDelete();
            $table->foreignId('question_option_id')->nullable()->constrained('tbl_question_options')->cascadeOnDelete();
            $table->tinyInteger('correct')->default(0);
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
        Schema::dropIfExists('test_result_answers');
    }
}
