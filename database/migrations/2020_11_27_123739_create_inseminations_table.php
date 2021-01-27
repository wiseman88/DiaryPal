<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInseminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inseminations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals');
            $table->date('date_of_insemination');
            $table->string('animal_number');
            $table->string('insemination_technician');
            $table->string('insemination_dose');
            $table->string('insemination_type');
            $table->string('insemination_encounter_by');
            $table->boolean('insemination_control')->default('0');
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
        Schema::dropIfExists('inseminations');
    }
}
