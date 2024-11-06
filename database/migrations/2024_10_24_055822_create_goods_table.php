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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('remains');
            $table->string('valid')->nullable();
            $table->bigInteger('machine_id')->unsigned();
            $table->timestamps();

            $table->foreign('machine_id')->references('id')->on('machines')->cascadeOnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
