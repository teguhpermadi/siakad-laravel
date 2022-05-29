<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $village = Village::all()->random();
        $findVillage = \Indonesia::findVillage($village->id, $with = ['province', 'city', 'district']);
        
        return [
            'username' => $this->faker->username(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

            'fullname' => $this->faker->name(),
            'nickname' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'jenis_kelamin' => $this->faker->randomElement($array = array('l', 'p')),
            'tanggal_lahir' => $this->faker->date(),
            'tempat_lahir' => $this->faker->city(),

            'alamat' => $this->faker->address(),
            'provinsi_id' => $findVillage->province->id,
            'kota_id' => $findVillage->city->id,
            'kecamatan_id' => $findVillage->district->id,
            'kelurahan_id' => $village->id,
            'long' => $village->meta['long'],
            'lat' => $village->meta['lat'],
            'kodepos' => $village->meta['pos'],

            'nama_ayah' => $this->faker->name($gender = 'male'),
            'pekerjaan_ayah' => $this->faker->jobTitle(),
            'penghasilan_ayah' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nama_ibu' => $this->faker->name($gender = 'female'),
            'pekerjaan_ibu' => $this->faker->jobTitle(),
            'penghasilan_ibu' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nama_wali' => $this->faker->name($gender = 'male' | 'female'),
            'pekerjaan_wali' => $this->faker->jobTitle(),
            'penghasilan_wali' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
