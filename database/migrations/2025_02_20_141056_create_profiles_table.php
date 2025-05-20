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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('photo');
            $table->string('fullName');
            $table->String ('nickName');
            $table->String ('phone');
            $table->string('address');
            $table->string('province_id');
            $table->string('ward_id');
            $table->string('subdistrict_id');
            $table->string('city_id');
            $table->enum('gender',['LAKI-LAKI','PEREMPUAN']);
            $table->date('dot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
