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
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('id');
      
            $table->string('name');
          });
      
          Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
      
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
      
            $table->bigInteger('action_id')->unsigned()->index();
            $table->foreign('action_id')->references('id')->on('actions');
      
            $table->binary('meta');
            $table->string('ip_address')->index();
      
            $table->timestamps();
          });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
        Schema::dropIfExists('actions');

    }
};
