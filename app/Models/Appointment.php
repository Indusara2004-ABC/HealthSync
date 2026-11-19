<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Appointment extends Model { protected $table='appointments'; protected $fillable=['user_id', 'doctor_id', 'patient_name', 'patient_email', 'patient_phone', 'appointment_at', 'notes', 'status']; public function doctor(){return $this->belongsTo(Doctor::class);} public function user(){return $this->belongsTo(User::class);} }
