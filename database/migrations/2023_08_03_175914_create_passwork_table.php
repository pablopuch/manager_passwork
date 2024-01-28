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
        Schema::create('passworks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passgroup_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('name')->default("Nueva contraseña");
            $table->string('user_pass');
            $table->string('email_pass')->nullable();
            $table->text('password_pass');
            $table->string('link')->nullable();
            $table->string('note')->nullable();
            $table->string('url_img')->nullable();
            $table->boolean('favourite')->nullable()->default(false);
            $table->timestamps();

            // Foreign keys
            $table->foreign('passgroup_id')->references('id')->on('passgroups');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passworks');
    }
};
