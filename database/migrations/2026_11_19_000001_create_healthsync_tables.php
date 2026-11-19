<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void{
  Schema::table('users',function(Blueprint $t){$t->string('role')->default('user');$t->string('phone')->nullable();$t->string('branch')->nullable();});
  Schema::create('doctors',function(Blueprint $t){$t->id();$t->string('name');$t->string('specialty');$t->string('phone')->nullable();$t->string('email')->nullable();$t->boolean('active')->default(true);$t->timestamps();});
  Schema::create('appointments',function(Blueprint $t){$t->id();$t->foreignId('user_id')->constrained()->cascadeOnDelete();$t->foreignId('doctor_id')->constrained()->restrictOnDelete();$t->string('patient_name');$t->string('patient_email');$t->string('patient_phone');$t->dateTime('appointment_at');$t->text('notes')->nullable();$t->string('status')->default('Pending');$t->timestamps();});
  Schema::create('contact_messages',function(Blueprint $t){$t->id();$t->foreignId('user_id')->nullable()->constrained()->nullOnDelete();$t->string('name');$t->string('email');$t->string('subject');$t->text('message');$t->timestamps();});
 }
 public function down():void{Schema::dropIfExists('contact_messages');Schema::dropIfExists('appointments');Schema::dropIfExists('doctors');Schema::table('users',function(Blueprint $t){$t->dropColumn(['role','phone','branch']);});}
};
