<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder { public function run():void { $email=env('HEALTHSYNC_ADMIN_EMAIL');$password=env('HEALTHSYNC_ADMIN_PASSWORD');if(!$email||!$password){throw new \RuntimeException('Set HEALTHSYNC_ADMIN_EMAIL and HEALTHSYNC_ADMIN_PASSWORD in .env');}User::updateOrCreate(['email'=>$email],['name'=>'Administrator','role'=>'admin','branch'=>'Main Branch','password'=>$password]);} }
