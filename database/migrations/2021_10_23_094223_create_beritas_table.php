<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->string('slug_judul', 255);
            $table->text('isi')->nullable();
            $table->string('foto')->default('default.jpg');
            $table->string('file')->default('0');
            $table->text('url_video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('beritas');
    }
}
