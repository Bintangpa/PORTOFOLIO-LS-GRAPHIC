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
        Schema::create('admin_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('message');
            $table->string('type'); // portfolio, navbar, website, contact, about, account, system
            $table->string('icon'); // FontAwesome icon class
            $table->boolean('is_read')->default(false);
            $table->string('action_type')->nullable(); // create, update, delete, upload
            $table->unsignedBigInteger('related_id')->nullable(); // ID of related record
            $table->string('related_type')->nullable(); // Model class name
            $table->timestamps();

            $table->index(['user_id', 'is_read']);
            $table->index(['user_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_notifications');
    }
};