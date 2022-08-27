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
        Schema::table('shoes', function (Blueprint $table) {
            $table->foreignId('gender_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('type_id')->nullable()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('sampler_id')->nullable()->constrained()
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
        Schema::table('shoes', function (Blueprint $table) {
            $table->dropForeign('gender_id');
            $table->dropColumn('gender_id');
            $table->dropForeign('category_id');
            $table->dropColumn('category_id');
            $table->dropForeign('type_id');
            $table->dropColumn('type_id');
            $table->dropForeign('sampler_id');
            $table->dropColumn('sampler_id');
        });
    }
};
