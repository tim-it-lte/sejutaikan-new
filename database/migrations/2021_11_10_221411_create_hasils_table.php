<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('hasils', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('permohonansampel_id')->unsigned();
            $table->bigInteger('jp_id')->unsigned();
            $table->bigInteger('parameter_id')->unsigned();
            $table->bigInteger('permohonanparameter_id')->unsigned();
            $table->string('hasil')->nullable();
            $table->string('standar_mutu')->nullable();
            $table->string('metode_uji')->nullable();
            $table->timestamps();

            $table->foreign('permohonansampel_id')->references('id')->on('permohonansampels')->onDelete('cascade');
            $table->foreign('jp_id')->references('id')->on('jps')->onDelete('cascade');
            $table->foreign('parameter_id')->references('id')->on('parameters')->onDelete('cascade');
            $table->foreign('permohonanparameter_id')->references('id')->on('permohonanparameters')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('hasils');
    }
}
