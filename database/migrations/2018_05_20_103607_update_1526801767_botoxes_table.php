<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1526801767BotoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('botoxes', function (Blueprint $table) {
            if(Schema::hasColumn('botoxes', 'clinic_name')) {
                $table->dropColumn('clinic_name');
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
        Schema::table('botoxes', function (Blueprint $table) {
                        $table->string('clinic_name')->nullable();
                
        });

    }
}
