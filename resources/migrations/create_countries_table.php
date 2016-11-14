<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');

            $table->json('name');
            $table->json('tld');
            $table->string('cca2');
            $table->string('ccn3');
            $table->string('cca3');
            $table->string('cioc');
            $table->json('currency')->nullable();
            $table->json('callingCode')->nullable();
            $table->string('capital')->nullable();
            $table->json('altSpellings');
            $table->string('region')->nullable();
            $table->string('subregion')->nullable();
            $table->json('languages');
            $table->json('translations');
            $table->json('latlng');
            $table->string('demonym');
            $table->boolean('landlocked');
            $table->json('borders')->nullable();
            $table->integer('area');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('countries');
    }
}
