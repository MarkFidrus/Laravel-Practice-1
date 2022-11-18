<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('introduction')->default('My introduction...');
            $table->string('country')->nullable();
            $table->string('settlement')->nullable();
            $table->string('profile_picture')->default('no_profile_picture.png');
            $table->string('cover_image')->default('no_cover_image.png');
            $table->json('friends')->nullable();
            $table->json('friend_request')->nullable();
            $table->string('password');
            $table->string('visibility')->default('public');
            $table->tinyInteger('is_sanctioned')->default(0);
            $table->tinyInteger('is_admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
