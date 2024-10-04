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
        Schema::create('marking_notice', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marking_id')->constrained()->onDelete('cascade');

            // Add a foreign key to the notices table, but in a different way because the primary key is different
            $table->unsignedBigInteger('notice_id');
            $table->foreign('notice_id')->references('notice_id')->on('notices')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marking_notice');
    }
};
