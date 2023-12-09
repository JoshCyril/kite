<?php

use App\Models\Category;
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
        Schema::create('category_quote', function (Blueprint $table) {
            $table->primary(['category_id', 'quote_id']);
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('quote_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('quote_id')->references('id')
                ->on('quotes')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_quote');
    }
};