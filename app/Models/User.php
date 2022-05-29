<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'fullname',
        'nickname',
        'avatar',
        'phone',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'ttd',
        'alamat',
        'kodepos',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'long',
        'lat',
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
        'penghasilan_wali',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
