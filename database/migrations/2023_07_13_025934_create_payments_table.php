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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->references('id')->on('bookings')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->float('amount');
            $table->char('currency',3)->default('USD');
            $table->string('method');
            $table->enum('status',['pending','completed','failed','cancelled'])->default('pending');
            $table->string('trans_id')->nullable();
            $table->json('trans_data')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
