<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('tracking_number', 90);
            $table->string('item_name', 90);
            $table->string('attributes', 90);
            $table->text('description');
            $table->string('item_image', 200)->default('no-image.jpg');
            $table->decimal('buying_price', 9, 2);
            $table->decimal('selling_price', 9, 2);
            $table->integer('quantity');
            $table->integer('type')->default(1);
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
        Schema::drop('items');
    }
}
