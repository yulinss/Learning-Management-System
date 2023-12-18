<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->nullable()->constrained('tbl_questions')->cascadeOnDelete();
            $table->text('option_text');
            $table->tinyInteger('correct')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_options');
    }
}
