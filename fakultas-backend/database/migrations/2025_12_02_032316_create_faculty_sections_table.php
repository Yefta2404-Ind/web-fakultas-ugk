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
    Schema::create('faculty_sections', function (Blueprint $table) {
        $table->id();
        $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
        $table->string('section_key');
        $table->string('title')->nullable();
        $table->longText('content')->nullable();
        $table->string('image')->nullable();
        $table->timestamps();

        $table->unique(['faculty_id', 'section_key']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_sections');
    }
};
