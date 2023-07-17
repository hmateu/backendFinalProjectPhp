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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('customer');
            $table->unsignedBigInteger('ticket_type');
            $table->float('price');
            $table->boolean('validated');
            $table->timestamps();

            
            $table->foreign('customer')->references('id')->on('users');
            $table->foreign('ticket_type')->references('id')->on('ticket_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
