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
    Schema::create('applications', function (Blueprint $table) {
        $table->bigIncrements('application_id'); // Primary key
        $table->unsignedBigInteger('candidate_id');
        $table->unsignedBigInteger('employee_id');
        $table->unsignedBigInteger('post_id');
        $table->string('phone_number', 20); // Define phone number as a string with proper length
        $table->string('email', 200);
        $table->string('cv', 200);
        $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
