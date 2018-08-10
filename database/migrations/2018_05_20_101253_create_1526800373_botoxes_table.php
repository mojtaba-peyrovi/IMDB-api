<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1526800373BotoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('botoxes')) {
            Schema::create('botoxes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('clinic_name')->nullable();
                $table->string('botox_name')->nullable();
                $table->decimal('price_per_unit', 15, 2)->nullable();
                $table->decimal('price_per_vial', 15, 2)->nullable();
                $table->integer('reward_points')->nullable();
                $table->tinyInteger('popular')->nullable()->default('0');
                $table->tinyInteger('apply_btn')->nullable()->default('1');
                $table->date('expire')->nullable();
                $table->tinyInteger('exclusive')->nullable()->default('0');
                $table->text('exclusive_desc')->nullable();
                $table->tinyInteger('featured')->nullable()->default('0');
                $table->text('featured_desc')->nullable();
                $table->tinyInteger('off_peak_available')->nullable()->default('0');
                $table->text('about_offpeak')->nullable();
                $table->text('about_package')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('botoxes');
    }
}
