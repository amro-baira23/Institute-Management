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
        $main_accounts = ['المصاريف', 'الإيرادات', 'الطلاب', 'الأساتذة', 'الصندوق', 'رأس المال', 'الموظفين'];
        Schema::create('sub_accounts', function (Blueprint $table) use ($main_accounts) {
            $table->id();
            $table->enum("main_account",$main_accounts);
            $table->foreignId("accountable_id")->nullable();
            $table->string("accountable_type")->nullable();
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
        Schema::dropIfExists('sub_accounts');
    }
};