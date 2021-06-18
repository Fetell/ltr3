<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    private $table = 'products';

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
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('subcat_id');
            $table->float('price')->default(0)->unsigned();
            $table->tinyInteger('amount')->default(0)->unsigned();
            $table->boolean('active')->default(false);
            $table->timestamps();

            $table->foreign('subcat_id')
                ->references('id')
                ->on('subcategories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
