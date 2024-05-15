<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('id_number');
            $table->string('college');
            $table->string('gender');
            $table->int('contact_number');
            $table->string('email')->unique();
            $table->string('usertype')->default('user');
            $table->boolean('delete_request')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });   

        // Add custom validation rule to restrict email extension
        \Validator::extend('cmu_email', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[^@]+@cmu\.edu\.ph$/', $value);
        });

        // Add unique constraint with custom validation rule for email column
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique()->change();
            $table->dropUnique(['email']); // Drop existing unique constraint
            $table->unique('email', 'unique_email_cmu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
