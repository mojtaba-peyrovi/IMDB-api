<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b018237eff67RelationshipsToBotoxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('botoxes', function(Blueprint $table) {
            if (!Schema::hasColumn('botoxes', 'clinic_name_id')) {
                $table->integer('clinic_name_id')->unsigned()->nullable();
                $table->foreign('clinic_name_id', '161124_5b01823440694')->references('id')->on('clinics')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('botoxes', function(Blueprint $table) {
            
        });
    }
}
