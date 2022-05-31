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
        Schema::disableForeignKeyConstraints();
        Schema::table('users', function (Blueprint $table) {
            // identitas pribadi
            $table->dropColumn([
                'fullname', 
                'nickname', 
                'avatar', 
                'phone', 
                'jenis_kelamin', 
                'tempat_lahir', 
                'tanggal_lahir', 
                'ttd'
            ]);

            // alamat
            $table->dropColumn([
                'alamat', 
                'kodepos', 
                'provinsi_id',
                'kota_id',
                'kecamatan_id',
                'kelurahan_id',
                'long', 
                'lat'
            ]);

            // $table->dropForeign(['provinsi_id']);
            
            // orang tua dan wali
            $table->dropColumn([
                'nik_ayah',
                'nama_ayah',
                'pekerjaan_ayah',
                'penghasilan_ayah',
                'nik_ibu',
                'nama_ibu',
                'pekerjaan_ibu',
                'penghasilan_ibu',
                'nik_wali',
                'nama_wali',
                'pekerjaan_wali',
                'penghasilan_wali'
            ]);
        });
    }
};
