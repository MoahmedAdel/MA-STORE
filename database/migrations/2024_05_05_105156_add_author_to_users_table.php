<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name')->unique()->after('name');
            $table->string('phone', 20)->unique()->nullable()->after('password');
            $table->string('image')->default('default.jpg')->after('phone');
            $table->enum('gender', ['m', 'f'])->comment('m -> male , f -> female')->after('image');
            $table->date('date_of_birth')->nullable()->after('gender');
            $table->enum('status', ['unblock', 'block'])->default('unblock')->nullable()->after('date_of_birth');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
