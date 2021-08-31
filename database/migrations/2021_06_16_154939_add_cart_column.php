<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCartColumn extends Migration
{
    private $table = 'cart';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->table))
        {
            Schema::dropIfExists($this->table);
        }

        Schema::create($this->table, function (Blueprint $table) {
            $table->smallInteger('total_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn('total_price');
        });
    }
}
