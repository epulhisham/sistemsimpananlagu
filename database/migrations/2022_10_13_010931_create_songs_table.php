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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('penilai_id')->nullable();
            $table->foreignId('status_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('keputusan_id')->default(3);
            $table->foreignId('song_category_id')->nullable();
            $table->string('artis');
            $table->string('tajuk');
            $table->string('album');
            $table->string('pencipta_lagu');
            $table->string('penulis_lirik');
            $table->string('syarikat_rakaman');
            $table->string('catatan');
            $table->string('lagu');
            $table->string('fail_lagu');
            $table->date('tarikh_diterima')->nullable();
            $table->date('tarikh_dinilai')->nullable();
            $table->date('tarikh_diluluskan')->nullable();
            $table->string('lirik')->nullable();
            $table->string('sebutan')->nullable();
            $table->string('nyanyian')->nullable();
            $table->string('muzik')->nullable();
            $table->string('penerbitan_teknikal')->nullable();
            $table->boolean('terbit')->default(false);
            $table->integer('downloadCount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
};
