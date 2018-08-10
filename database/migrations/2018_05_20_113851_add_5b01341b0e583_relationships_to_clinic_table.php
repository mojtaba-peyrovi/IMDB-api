<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b01341b0e583RelationshipsToClinicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinics', function(Blueprint $table) {
            if (!Schema::hasColumn('clinics', 'clinic_name_id')) {
                $table->integer('clinic_name_id')->unsigned()->nullable();
                $table->foreign('clinic_name_id', '161120_5b0130cfba1a4')->references('id')->on('botoxes')->onDelete('cascade');
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
        Schema::table('clinics', function(Blueprint $table) {
            
        });
    }
}
