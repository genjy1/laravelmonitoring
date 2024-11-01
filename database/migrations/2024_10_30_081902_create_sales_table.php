<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->dateTime('dateTime');
            $table->string('type');
            $table->string('test')->default(0);
            $table->string('balance')->default(0);
            $table->string('complete')->default(1);
            $table->string('promocode')->nullable();
            $table->string('cashless_id')->default('amv@vend-shop.com')->nullable();
            $table->bigInteger('machine_id')->unsigned();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('machines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
