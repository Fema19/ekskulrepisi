<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerationsTable extends Migration
{
    public function up()
    {
        Schema::create('generations', function (Blueprint $table) {
            $table->id(); // Creates an unsignedBigInteger 'id' column
            $table->string('name');
            $table->year('year');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('generations');
    }
}