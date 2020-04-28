<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individuals', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('postalAdress')->nullable()->default(null);
            $table->string('postalCode');
            $table->string('town')->nullable()->default(null);
            $table->string('city');
            $table->string('country')->nullable()->default(null);
            $table->string('serviceDestination')->nullable()->default(null);
            $table->string('mail')->nullable()->default(null);
            $table->string('tel')->nullable()->default(null);
            $table->string('fax')->nullable()->default(null);
            $table->string('contactPerson');
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
        Schema::dropIfExists('individuals');
    }
}
