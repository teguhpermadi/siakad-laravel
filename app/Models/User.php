<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuid, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $incrementing = false;
    
    protected $keyType = 'uuid';

    protected $guard_name = 'web';

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
        'is_active',
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

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
        // $url = Storage::url('uploads/avatars/' . $this->avatar);
        // return $url;
    }

    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public function adminlte_profile_url()
    {
        // return 'profile/username';
        return 'profile';
    }

    public function provinsi()
    {
        return $this->belongsTo(Province::class);
    }
    
    public function kota()
    {
        return $this->belongsTo(City::class);
    }
    public function kecamatan()
    {
        return $this->belongsTo(District::class);
    }
    public function kelurahan()
    {
        return $this->belongsTo(Village::class);
    }
}
