<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipo', ['Doc', 'Ofício', 'Carta', 'FAX', 'E-mail', 'CI']);
            $table->integer('numero')->nullable();
            $table->string('origem');
            $table->date('entrada');
            $table->string('assunto');
            $table->unsignedBigInteger('setor_id')->nullable();
            $table->date('data_encaminhamento')->nullable();
            $table->text('providencia')->nullable();
            $table->date('data_providencia')->nullable();
            $table->unsignedBigInteger('municipio_id');
            $table->enum('natureza', ['Administrativa Interna', 'Administrativa Externa'])->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();

            $table->foreign('setor_id')
                            ->references('id')
                            ->on('setores');

            $table->foreign('municipio_id')
                            ->references('id')
                            ->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
