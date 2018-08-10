<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b0134b96d0235b0134b96b21cBotoxClinicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('botox_clinic');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('botox_clinic')) {
            Schema::create('botox_clinic', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('botox_id')->unsigned()->nullable();
            $table->foreign('botox_id', 'fk_p_161124_161120_clinic_5b011ffbda369')->references('id')->on('botoxes');
                $table->integer('clinic_id')->unsigned()->nullable();
            $table->foreign('clinic_id', 'fk_p_161120_161124_botox__5b011ffbd9abc')->references('id')->on('clinics');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
