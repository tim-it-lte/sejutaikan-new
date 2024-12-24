<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeterangansTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('keterangans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('permohonansampel_id')->unsigned();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('permohonansampel_id')->references('id')->on('permohonansampels')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('keterangans');
    }
}
