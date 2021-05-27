<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_news', function (Blueprint $table) {
            $table->foreignId('author_id')
                ->references('id')
                ->on('authors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                $table->foreignId('news_id')
                ->references('id')
                ->on('news')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_news');
    }
}
