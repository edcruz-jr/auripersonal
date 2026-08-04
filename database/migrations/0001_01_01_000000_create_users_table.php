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
        // Adicionando as tabelas dimensionais que irão auxiliar na criação dos usuários
        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('main_objectives', function (Blueprint $table) {
            $table->id();
            $table->string('objective');
            $table->timestamps();
        });

        Schema::create('activity_levels', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->float('level', 3, 2);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->date('birth_date');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->integer('height');
            $table->float('weight', 10, 2)->nullable();
            $table->unsignedBigInteger('main_objective_id')->nullable();
            $table->unsignedBigInteger('activity_level_id');
            $table->string('dietary_restrictions')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('main_objective_id')->references('id')->on('main_objectives');
            $table->foreign('activity_level_id')->references('id')->on('activity_levels');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_gender_id_foreign');
            $table->dropForeign('users_main_objective_id_foreign');
            $table->dropForeign('users_activity_level_id_foreign');
        });

        Schema::dropIfExists('activity_levels');
        Schema::dropIfExists('main_objectives');
        Schema::dropIfExists('genders');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
