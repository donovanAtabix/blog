<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('user_id');
            $table->nullableTimestamps();

            $table->foreign('role_id', 'role_user_role_id_foreign')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('user_id', 'role_user_user_id_foreign')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unique(['role_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
