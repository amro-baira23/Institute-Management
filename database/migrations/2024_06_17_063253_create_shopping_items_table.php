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
        Schema::create('shopping_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("item_id")->constrained(table: "stocks");
            $table->foreignId("course_id")->nullable()->constrained(table: "courses");
            $table->string('list_name')->nullable();
            $table->integer('bought')->default(0);
            $table->integer("amount", unsigned: true);
            $table->boolean("per_student")->default(false);
            $table->boolean('is_bought')->default(false);
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
        Schema::dropIfExists('shopping_items');
    }
};