<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    protected $connection = "pgsql";

    public function up(): void
    {
        Schema::create('stipen', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("result");
            $table->integer("prcnt");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stipen');
    }
};
