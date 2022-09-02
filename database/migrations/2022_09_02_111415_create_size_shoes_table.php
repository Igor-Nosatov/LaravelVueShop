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
        Schema::create('size_shoes', function (Blueprint $table) {
            $table->id();
            $table->integer('size_id')->unsigned()->nullable()->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('shoes_id')->unsigned()->nullable()->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('size_shoes');
    }
};
