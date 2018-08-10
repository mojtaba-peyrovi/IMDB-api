<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b011ffc2a432BotoxClinicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('botox_clinic')) {
            Schema::create('botox_clinic', function (Blueprint $table) {
                $table->integer('botox_id')->unsigned()->nullable();
                $table->foreign('botox_id', 'fk_p_161124_161120_clinic_5b011ffc2a52b')->references('id')->on('botoxes')->onDelete('cascade');
                $table->integer('clinic_id')->unsigned()->nullable();
                $table->foreign('clinic_id', 'fk_p_161120_161124_botox__5b011ffc2a5be')->references('id')->on('clinics')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('botox_clinic');
    }
}
