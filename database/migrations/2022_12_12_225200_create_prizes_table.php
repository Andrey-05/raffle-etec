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
        Schema::create('prizes', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("description");
            $table->integer("position");
            $table->string("raffle_id");
            $table->timestamps();

            $table->foreign("raffle_id")->references("id")->on("raffles");
            $table->unique(["raffle_id", "position"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prizes');
    }
};
