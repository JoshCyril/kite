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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quote_id')->unsigned();
            $table->bigInteger('user_detail_id')->unsigned();
            $table->string("body", 256);
            $table->timestamps();

            $table->foreign('quote_id')->references('id')
                ->on('quotes')->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_detail_id')->references('id')
                ->on('user_details')->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};