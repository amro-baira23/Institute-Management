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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('credentials');
            $table->foreignId('person_id')->constrained(table: "persons");
            $table->foreignId("shift_id")->constrained();
            $table->foreignId("job_id")->constrained(table: "job_titles");
            $table->foreignId("account_id")->nullable()->constrained(table: "users");
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
        Schema::dropIfExists('employees');
    }
};