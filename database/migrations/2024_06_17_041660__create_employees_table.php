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
             $table->string('name');
            $table->date('birth_date');
            $table->string('phone_number');
            $table->string('credentials');
            $table->foreignId("shift_id")->constrained();
            $table->foreignId("job_id")->constrained(table: "job_titles");
            $table->foreignId("account_id")->nullable()->constrained(table: "users")->onDelete("set null");
            $table->timestamps();
            $table->softDeletes();
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