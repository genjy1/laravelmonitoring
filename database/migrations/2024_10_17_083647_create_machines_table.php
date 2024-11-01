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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('number');
            $table->string('imei');
            $table->string('name');
            $table->string('address');
            $table->bigInteger('balance')->nullable();
            $table->string('condition');
            $table->string('errors');
            $table->date('subscription_until');
            $table->string('software_version');
            $table->string('cash_counter')->nullable()->default(0);
            $table->string('goods_sold')->nullable()->default(0);
            $table->string('goods_total')->nullable()->default(0);
            $table->string('capacity')->default(1);
            $table->string('controller_id');
            $table->bigInteger('user_id')->unsigned()->nullable()->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
