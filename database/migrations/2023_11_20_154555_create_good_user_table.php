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
        Schema::create('good_user', function (Blueprint $table) {
            $table->id();
            $table->dateTime('created_at');
            $table->bigInteger('amount')->default(1);

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('good_id')->constrained('goods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_user');
    }
};
