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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->foreignId('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
            $table->foreignId('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade');
            $table->foreignId('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
            $table->foreignId('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('address')->nullable();

            $table->char('zip_code')->nullable();

            $table->date('date_of_birth');
            $table->date('date_hired');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
