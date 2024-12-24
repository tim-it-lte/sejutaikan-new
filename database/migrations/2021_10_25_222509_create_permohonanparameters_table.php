<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanparametersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('permohonanparameters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('permohonansampel_id')->unsigned();
            $table->bigInteger('jp_id')->unsigned();
            $table->bigInteger('parameter_id')->unsigned();
            $table->bigInteger('harga');
            $table->integer('jumlah');
            $table->bigInteger('total')->default(0);
            $table->string('nomor')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('permohonansampel_id')->references('id')->on('permohonansampels')->onDelete('cascade');
            $table->foreign('jp_id')->references('id')->on('jps')->onDelete('cascade');
            $table->foreign('parameter_id')->references('id')->on('parameters')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('permohonanparameters');
    }
}
