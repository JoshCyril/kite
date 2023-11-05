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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('content', 2048);
            $table->longText('explanation');
            $table->string('cover_image', 2048)->nullable();
            $table->string('author', 25);
            $table->datetime('quoted_at');
            $table->timestamps();

            // $table->foreign('user_detail_id')->references('id')->on('user_details')
            //     ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
