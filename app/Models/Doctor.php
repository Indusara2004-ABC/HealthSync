<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Doctor extends Model { protected $table='doctors'; protected $fillable=['name', 'specialty', 'phone', 'email', 'active'];  public function appointments(){return $this->hasMany(Appointment::class);} }
