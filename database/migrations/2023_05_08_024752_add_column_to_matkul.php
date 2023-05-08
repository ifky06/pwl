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
        Schema::table('matkul', function (Blueprint $table) {
            $table->integer('sks')->after('nama')->nullable();
            $table->integer('jam')->after('sks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matkul', function (Blueprint $table) {
            $table->dropColumn('sks');
            $table->dropColumn('jam');
        });
    }
};
