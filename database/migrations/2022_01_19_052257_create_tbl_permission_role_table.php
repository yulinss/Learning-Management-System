<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_permission_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('permission_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->timestamps();
            $table->foreign('permission_id')->references('id')->on('tbl_permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('tbl_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_permission_role');
    }
}
