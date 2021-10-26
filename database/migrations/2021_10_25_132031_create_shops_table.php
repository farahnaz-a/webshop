<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->string('shop_name');
            $table->string('domain_name');
            $table->string('image');
            $table->string('email');
            $table->string('phone_number');
            $table->longText('address');
            $table->longText('details');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references("id")->on("users")
                  ->onDelete("cascade");
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
        Schema::dropIfExists('shops');
    }
}
