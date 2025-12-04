<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration {
public function up(): void
{
    Schema::create('faculties', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('logo')->nullable();
        $table->string('hero_image')->nullable();
        $table->boolean('status')->default(true);
        $table->timestamps();
    });
}

    public function down() {
        Schema::dropIfExists('faculties');
    }
}
