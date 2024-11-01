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
        Schema::create('candidate_info', function (Blueprint $table) {
            $table->id();
            $table->integer("candidate_id");
            $table->string("candidate_address",255);
            $table->text("education");
            $table->text("cv_path");
            $table->text("image_path");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_info');
    }
};
