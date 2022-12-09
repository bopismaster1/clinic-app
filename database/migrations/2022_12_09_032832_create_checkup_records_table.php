<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkup_records', function (Blueprint $table) {
            $table->id();
            $table->integer("patient_id");
            $table->string("doctor_id");
            $table->string("symptoms");
            $table->string("findings");
            $table->string("remarks");
            $table->string("images");
            $table->string("status");
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
        Schema::dropIfExists('checkup_records');
    }
};
