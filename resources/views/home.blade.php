@extends('layout')
@section('content')
<style>
/* Patient home only: shared navbar and other pages are untouched. */
.hs-home-hero{display:grid;grid-template-columns:minmax(0,1.08fr) minmax(0,1fr);gap:clamp(35px,6vw,105px);align-items:center;max-width:1390px;margin:0 auto;padding:clamp(24px,5vw,78px) clamp(12px,3vw,38px) 100px;min-height:calc(100vh - 210px)}
.hs-home-copy{align-self:center}
.hs-home-eyebrow{display:inline-block;background:#d1e1e0;color:#286e6b;font-size:13px;font-weight:600;border-radius:5px;padding:4px 6px;margin-bottom:27px}
.hs-home-title{font-size:clamp(44px,4.5vw,70px);line-height:1.13;letter-spacing:-1.9px;font-weight:800;color:#080808;max-width:690px;margin:0 0 27px}
.hs-home-title .accent{color:#15968c}
.hs-home-description{font-size:clamp(17px,1.5vw,21px);line-height:1.23;color:#8a8a8a;max-width:550px;margin:0}
.hs-home-visual{display:flex;justify-content:center;align-items:center}
.hs-home-visual img{display:block;width:100%;max-width:505px;aspect-ratio:502/496;object-fit:cover;border-radius:105px}
@media(max-width:850px){.hs-home-hero{grid-template-columns:1fr;min-height:0;gap:36px;padding:32px 16px 75px}.hs-home-title{font-size:clamp(38px,7vw,58px)}.hs-home-visual img{max-width:500px;border-radius:65px}}
@media(max-width:460px){.hs-home-title{letter-spacing:-1px}.hs-home-visual img{border-radius:45px}}
</style>
<main class="hs-home-hero">
  <div class="hs-home-copy">
    <span class="hs-home-eyebrow">Welcome to your HealthCare destination</span>
    <h1 class="hs-home-title">Your <span class="accent">Health</span>, Our Priority<br>Expert <span class="accent">Care</span> You Can Trust!</h1>
    <p class="hs-home-description">Get the care you need with our friendly team of doctors and staff, We're here to help you feel better and stay healthy.Learn about our services and reach out to us anytime!</p>
  </div>
  <div class="hs-home-visual"><img src="{{ asset('healthsync-doctors.jpg') }}" alt="HealthSync healthcare team"></div>
</main>
@endsection
