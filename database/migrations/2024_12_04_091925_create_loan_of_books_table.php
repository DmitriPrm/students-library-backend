<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $connection = "pgsql2";

    public function up(): void
    {
        Schema::create('loan_of_books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("books_id");
            $table
                ->foreign("books_id")
                ->references('id')
                ->on('books')
                ->onDelete('cascade');
            $table->integer("readers_id_stud");
            $table->date("date_loan");
            $table->date("date_return");
            $table->integer("tenure");
            $table->integer("current_tenure");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_of_books');
    }
};
