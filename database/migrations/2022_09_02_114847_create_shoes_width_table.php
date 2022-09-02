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
        Schema::create('shoes_width', function (Blueprint $table) {
            $table->id();
            $table->integer('shoes_id')->unsigned()->nullable()->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('width_id')->unsigned()->nullable()->constrained()
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
        Schema::dropIfExists('shoes_width');
    }
};
