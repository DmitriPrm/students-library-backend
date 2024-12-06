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
        Schema::create('exam', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("student_id");
            $table
                ->foreign("student_id")
                ->references('id')
                ->on('student')
                ->onDelete('cascade');
            $table->integer("stipen_result_id");
            $table
                ->foreign("stipen_result_id")
                ->references('id')
                ->on('stipen')
                ->onDelete('cascade');
            $table->integer("mark1");
            $table->integer("mark2");
            $table->integer("mark3");
            $table->integer("mark4");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam');
    }
};
