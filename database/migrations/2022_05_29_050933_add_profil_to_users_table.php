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
        Schema::table('users', function (Blueprint $table) {
            $table->after('password', function ($table) {
                // identitas pribadi
                $table->string('fullname');
                $table->string('nickname')->nullable();
                $table->string('avatar')->nullable();
                $table->string('phone')->nullable();
                $table->enum('jenis_kelamin', ['l', 'p'])->nullable();
                $table->string('tempat_lahir')->nullable();
                $table->date('tanggal_lahir')->nullable();
                $table->string('ttd')->nullable();

                // alamat
                $table->string('alamat')->nullable();
                $table->string('kodepos')->nullable();
                $table->unsignedBigInteger('provinsi_id')->nullable();
                $table->foreign('provinsi_id')->references('id')->on(config('laravolt.indonesia.table_prefix') . 'provinces');
                $table->unsignedBigInteger('kota_id')->nullable();
                $table->foreign('kota_id')->references('id')->on(config('laravolt.indonesia.table_prefix') . 'cities');
                $table->unsignedBigInteger('kecamatan_id')->nullable();
                $table->foreign('kecamatan_id')->references('id')->on(config('laravolt.indonesia.table_prefix') . 'districts');
                $table->unsignedBigInteger('kelurahan_id')->nullable();
                $table->foreign('kelurahan_id')->references('id')->on(config('laravolt.indonesia.table_prefix') . 'villages');
                $table->string('long');
                $table->string('lat');

                // orang tua dan wali
                $table->string('nik_ayah')->nullable();
                $table->string('nama_ayah')->nullable();
                $table->string('pekerjaan_ayah')->nullable();
                $table->string('penghasilan_ayah')->nullable();
                $table->string('nik_ibu')->nullable();
                $table->string('nama_ibu')->nullable();
                $table->string('pekerjaan_ibu')->nullable();
                $table->string('penghasilan_ibu')->nullable();
                $table->string('nik_wali')->nullable();
                $table->string('nama_wali')->nullable();
                $table->string('pekerjaan_wali')->nullable();
                $table->string('penghasilan_wali')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // identitas pribadi
            // $table->dropColumn('fullname');
            // $table->dropColumn('nickname');
            // $table->dropColumn('avatar');
            // $table->dropColumn('phone');
            // $table->dropColumn('jenis_kelamin');
            // $table->dropColumn('tempat_lahir');
            // $table->dropColumn('tanggal_lahir');
            // $table->dropColumn('ttd');

            // alamat
            // $table->dropColumn('alamat');
            // $table->dropColumn('kodepos');
            // $table->dropColumn('provinsi_id');
            // $table->dropColumn('kota_id');
            // $table->dropColumn('kecamatan_id');
            // $table->dropColumn('kelurahan_id');
            // $table->dropColumn('long');
            // $table->dropColumn('lat');

            // orang tua dan wali
            // $table->dropColumn('nik_ayah');
            // $table->dropColumn('nama_ayah');
            // $table->dropColumn('pekerjaan_ayah');
            // $table->dropColumn('penghasilan_ayah');
            // $table->dropColumn('nik_ibu');
            // $table->dropColumn('nama_ibu');
            // $table->dropColumn('pekerjaan_ibu');
            // $table->dropColumn('penghasilan_ibu');
            // $table->dropColumn('nik_wali');
            // $table->dropColumn('nama_wali');
            // $table->dropColumn('pekerjaan_wali');
            // $table->dropColumn('penghasilan_wali');
        });
    }
};
