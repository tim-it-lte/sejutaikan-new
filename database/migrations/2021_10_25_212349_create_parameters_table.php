<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jp_id')->unsigned();
            $table->string('parameter');
            $table->bigInteger('harga')->default(0);
            $table->integer('nomor')->default(1);
            $table->integer('aktif')->default(1);
            $table->text('pesan')->nullable();
            $table->string('metode_uji')->nullable();
            $table->timestamps();

            $table->foreign('jp_id')->references('id')->on('jps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('parameters');
    }
}
