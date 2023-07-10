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
        Schema::table('users', function (Blueprint $table) {
            $table->string('dni')->after('id');
            $table->string('surname')->after('name');
            $table->string('age')->after('surname');
            $table->string('cp')->after('age');
            $table->string('mobile')->after('cp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('dni');
            $table->dropColumn('surname');
            $table->dropColumn('age');
            $table->dropColumn('cp');
            $table->dropColumn('mobile');
        });
    }
};