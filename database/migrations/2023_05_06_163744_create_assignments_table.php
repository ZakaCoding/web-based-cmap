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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cmap_id');
            $table->string('keycode')->unique();
            $table->string('focus_question');
            $table->date('due_date');
            $table->string('timer');
            $table->enum('method', ['scored', 'unscored']);
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('cmap_id')->on('cmaps')->references('id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
