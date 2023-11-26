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
        Schema::create('markdowns', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Markdown name');
            $table->string('slug')->comment('Slug use in urls');
            $table->string('file_location')->comment('Located inside the storage folder');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markdowns');
    }
};
