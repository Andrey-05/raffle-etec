<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raffles', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("title");
            $table->string("description");
            $table->date("date");
            $table->float("price");
            $table->string("manager_id");
            $table->timestamps();

            $table->foreign("manager_id")->references("id")->on("managers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raffles');
    }
};
