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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("event_id");
            $table->foreign("event_id")->on("events")->references("id")->cascadeOnDelete();
            $table->unsignedBigInteger("spot_id")->nullable();
            $table->foreign("spot_id")->on("spots")->references("id")->cascadeOnDelete();
            $table->string("operation_type");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
