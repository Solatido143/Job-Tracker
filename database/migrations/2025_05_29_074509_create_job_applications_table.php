<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('original_name');
            $table->string('file_path');
            $table->timestamps();
        });

        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('company');
            $table->enum('status', ['applied', 'interviewing', 'offered', 'rejected', 'hired'])->default('applied');
            $table->date('applied_at')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('resume_id')->nullable();
            $table->timestamps();
        });

        Schema::table('job_applications', function (Blueprint $table) {
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
