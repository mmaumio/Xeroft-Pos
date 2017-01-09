<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('company_name', 100);
            $table->string('product_name', 100);
            $table->string('email', 30);
            $table->string('phone_number', 20);
            $table->string('avatar', 200)->default('no-image.jpg');
            $table->string('address', 200);
            $table->string('city', 30);
            $table->string('zip', 20);
            $table->string('account', 20);
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
        Schema::drop('suppliers');
    }
}
