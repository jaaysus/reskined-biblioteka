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
        Schema::create('livre_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livre_id')->constrained('livres');
            $table->text('changes'); // Store the changes as JSON
            $table->string('action'); // Action: Created, Updated, Deleted
            $table->foreignId('user_id')->nullable()->constrained('users'); // User who made the change
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livre_histories');
    }
};
