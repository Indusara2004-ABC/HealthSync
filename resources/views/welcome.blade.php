@extends('layout')
@section('content')
<style>
/* Scoped to the Welcome page only. No global layout or navigation changes. */
.hs-welcome { color:#111b31; margin-top:0; }
.hs-welcome-hero { text-align:center; background:#fff; padding:52px 24px 77px; border-radius:12px 12px 0 0; }
.hs-welcome-label { display:inline-flex; align-items:center; gap:7px; border:1px solid #a6eee2; border-radius:100px; background:#edfffb; color:#0d9488; padding:5px 13px; font-size:11px; font-weight:750; letter-spacing:.025em; }
.hs-welcome-hero h1 { font-size:clamp(32px,3.4vw,44px); font-weight:800; letter-spacing:-1.7px; line-height:1.08; margin:18px auto 18px; max-width:720px; }
.hs-welcome-hero p { max-width:630px; margin:0 auto; font-size:15px; line-height:1.55; color:#64748b; }
.hs-welcome-cta { margin-top:30px; display:inline-flex; align-items:center; gap:9px; border-radius:10px; background:#0d9488; color:white; text-decoration:none; padding:14px 20px; font-size:14px; font-weight:700; }
.hs-welcome-cta:hover { background:#0f766e; color:white; }
.hs-welcome-modules { background:#f8fafc; border-top:1px solid #dce4ec; text-align:center; padding:66px 30px 62px; }
.hs-welcome-modules h2 { font-size:27px; letter-spacing:-.7px; font-weight:800; margin:0 0 9px; }
.hs-welcome-subtitle { color:#64748b; font-size:14px; line-height:1.55; max-width:490px; margin:0 auto 38px; }
.hs-welcome-grid { max-width:1120px; margin:0 auto; display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:20px; text-align:left; }
.hs-welcome-card { border:1px solid #d8e2ed; border-radius:13px; background:white; padding:22px 20px; min-height:192px; }
.hs-welcome-icon { display:flex; align-items:center; justify-content:center; width:37px; height:37px; border-radius:11px; margin-bottom:17px; background:#eafbf8; color:#0d9488; font-size:17px; }
.hs-welcome-card:nth-child(even) .hs-welcome-icon { background:#edf8ff; color:#0284c7; }
.hs-welcome-card h3 { font-size:15px; margin:0 0 9px; font-weight:750; }
.hs-welcome-card p { font-size:12.5px; color:#64748b; line-height:1.65; margin:0; }
@media(max-width:850px) { .hs-welcome-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
@media(max-width:520px) { .hs-welcome-hero { padding:46px 18px 55px; } .hs-welcome-modules { padding:46px 16px; } .hs-welcome-grid { grid-template-columns:1fr; } .hs-welcome-hero h1 { letter-spacing:-1px; } }
</style>
<main class="hs-welcome">
  <section class="hs-welcome-hero">
    <div class="hs-welcome-label"><i class="fa-solid fa-hospital"></i> CLINIC MANAGEMENT SYSTEM</div>
    <h1>Smart Clinic &amp; Patient<br>Management</h1>
    <p>Streamline appointment scheduling, digital patient records, doctor availability, and pharmacy workflows in one unified, easy-to-use healthcare platform.</p>
    <a class="hs-welcome-cta" href="{{ auth()->check() ? route('book') : route('login') }}"><i class="fa-regular fa-calendar-check"></i> Book an Appointment</a>
  </section>
  <section class="hs-welcome-modules">
    <h2>Core Clinic Modules</h2>
    <p class="hs-welcome-subtitle">Everything your medical staff and patients need for smooth daily operations.</p>
    <div class="hs-welcome-grid">
      <article class="hs-welcome-card"><div class="hs-welcome-icon"><i class="fa-solid fa-hospital-user"></i></div><h3>Patients</h3><p>Maintain complete digital medical histories, demographics, and visit records in one secure profile.</p></article>
      <article class="hs-welcome-card"><div class="hs-welcome-icon"><i class="fa-solid fa-user-doctor"></i></div><h3>Doctors</h3><p>Manage physician profiles, specialties, consultation schedules, and daily availability slots effortlessly.</p></article>
      <article class="hs-welcome-card"><div class="hs-welcome-icon"><i class="fa-solid fa-calendar-days"></i></div><h3>Appointments</h3><p>Simplify online booking, queue management, and visit status tracking to eliminate scheduling conflicts.</p></article>
      <article class="hs-welcome-card"><div class="hs-welcome-icon"><i class="fa-solid fa-pills"></i></div><h3>Pharmacy</h3><p>Process digital prescriptions accurately and monitor medication inventory levels in real time.</p></article>
    </div>
  </section>
</main>
@endsection
