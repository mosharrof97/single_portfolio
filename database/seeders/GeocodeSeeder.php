<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Geocode;
use Illuminate\Support\Facades\File;

class GeocodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/seeders/geocode.json');
        $geocodes = collect(json_decode($json));
        $geocodes->each(function($geocode){
            Geocode::create([
                'district'=>$geocode->district,
                'thana'=>$geocode->thana,
                'postoffice'=>$geocode->postoffice,
                'postcode'=>$geocode->postcode,
            ]);
        });
    }
}
