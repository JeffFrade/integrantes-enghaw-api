<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disk_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_disk')->unsigned();
            $table->bigInteger('id_member')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_disk')
                ->references('id')
                ->on('disks')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_member')
                ->references('id')
                ->on('members')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disk_members');
    }
}
