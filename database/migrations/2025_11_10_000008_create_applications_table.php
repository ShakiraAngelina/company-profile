<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 50)->nullable();
            $table->string('cv_file', 255)->nullable();
            $table->text('message')->nullable();
            $table->unsignedBigInteger('career_id');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};