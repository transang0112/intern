<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoronavirusCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coronavirus_cases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('country');
            $table->integer('total_cases')->nullable();
            $table->integer('new_cases')->nullable();
            $table->integer('total_deaths')->nullable();
            $table->integer('new_deaths')->nullable();
            $table->integer('total_recovered')->nullable();
            $table->integer('active_cases')->nullable();
            $table->integer('critical')->nullable();
            $table->integer('tot_cases')->nullable();
            $table->integer('deaths')->nullable();
            $table->integer('total_tests')->nullable();
            $table->integer('tests')->nullable();
            $table->integer('population')->nullable();
            $table->integer('1_case')->nullable();
            $table->integer('1_death')->nullable();
            $table->integer('1_test')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coronavirus_cases');
    }
}
