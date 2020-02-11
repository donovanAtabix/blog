<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissionables', function (Blueprint $table) {
            $table->unsignedInteger('permission_id');
            $table->unsignedInteger('permissionable_id');
            $table->string('permissionable_type');
            $table->nullableTimestamps();

            $table->index('permissionable_id');
            $table->index('permissionable_type');

            $table->unique(['permission_id', 'permissionable_id', 'permissionable_type'],
                'permissionables_id_type_permission_unique');

            $table->foreign('permission_id', 'permissionables_permission_id_foreign')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissionables');
    }
}
