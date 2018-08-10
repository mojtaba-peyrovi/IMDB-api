<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1526804497ClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinics', function (Blueprint $table) {
            if(Schema::hasColumn('clinics', 'clinic_id')) {
                $table->dropForeign('161120_5b011c5c4bf60');
                $table->dropIndex('161120_5b011c5c4bf60');
                $table->dropColumn('clinic_id');
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
