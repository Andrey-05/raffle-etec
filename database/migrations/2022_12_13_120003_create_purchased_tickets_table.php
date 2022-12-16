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
        Schema::create('purchased_tickets', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("raffle_id");
            $table->uuid("seller_id");
            $table->string("buyer_phone");
            $table->string("buyer_name");
            $table->integer("ticket_number");
            $table->date("purchase_date");
            $table->timestamps();

            $table->foreign("raffle_id")->references("id")->on("raffles")->onDelete("cascade");
            $table->foreign("seller_id")->references("id")->on("sellers");
            $table->unique(["raffle_id", "ticket_number"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchased_tickets');
    }
};
