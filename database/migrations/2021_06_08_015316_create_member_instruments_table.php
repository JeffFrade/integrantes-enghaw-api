<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberInstrumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_instruments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_member')->unsigned();
            $table->bigInteger('id_instrument')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_member')
                ->references('id')
                ->on('members')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('id_instrument')
                ->references('id')
                ->on('instruments')
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
        Schema::dropIfExists('member_instruments');
    }
}
