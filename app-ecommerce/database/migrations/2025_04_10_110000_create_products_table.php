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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // bigint(20)
            $table->string('name', 255);
            $table->text('detail')->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('price'); // int(11)
            $table->integer('stock'); // int(11)
            $table->unsignedBigInteger('companyid');
            $table->timestamps();
            $table->foreign('companyid')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};