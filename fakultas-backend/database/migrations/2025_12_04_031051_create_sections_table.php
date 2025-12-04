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
    Schema::create('sections', function (Blueprint $table) {
        $table->id();
        $table->foreignId('faculty_id')->constrained('faculties')->onDelete('cascade');
        $table->string('section_name'); // hero, profil, visi_misi, program_studi, fasilitas, dosen, prestasi, berita
        $table->json('content')->nullable(); // text, image, video, link dlsb
        $table->boolean('is_published')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
