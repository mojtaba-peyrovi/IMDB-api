<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1526805671ClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinics', function (Blueprint $table) {
            if(Schema::hasColumn('clinics', 'clinic_name_id')) {
                $table->dropForeign('161120_5b0130cfba1a4');
                $table->dropIndex('161120_5b0130cfba1a4');
                $table->dropColumn('clinic_name_id');
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
        Schema::table('clinics', function (Blueprint $table) {
                        
        });

    }
}
