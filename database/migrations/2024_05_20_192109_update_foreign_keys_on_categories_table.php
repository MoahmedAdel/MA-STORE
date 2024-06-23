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
        Schema::table('categories', function (Blueprint $table) {

            $table->dropForeign(['parent_id']);
            $table->dropForeign(['user_id']);

            // Add the new foreign key constraint with restrict on delete
            $table->foreign('parent_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->restrictOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};
