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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('fuel_id')->constrained()->onDelete('cascade');
            $table->unsignedDecimal('price', $precision = 8, $scale = 2);
            $table->unsignedDecimal('cash_paid', $precision = 8, $scale = 2);
            $table->unsignedDecimal('litres', $precision = 8, $scale = 2);
            $table->bigInteger('phone_number');
            $table->integer('access_token')->nullable();
            $table->boolean('status')->nullable(); // NULL = Processing, 0 = Rejected, 1 = Approved.
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
        Schema::dropIfExists('transactions');
    }
};
