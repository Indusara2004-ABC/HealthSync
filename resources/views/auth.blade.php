@extends('layout')
@section('content')
<style>
/* Scoped exclusively to the login and registration cards. */
.hs-auth-wrap{display:flex;justify-content:center;padding:22px 12px 42px}
.hs-auth-card.hs-form{position:relative;width:100%;max-width:475px;min-height:555px;margin:0;padding:100px 70px 45px;background:#fff;border:2px solid #444;border-radius:11px;box-shadow:none;color:#101d4b}
.hs-auth-card .hs-auth-title{position:absolute;top:-2px;left:50%;transform:translateX(-50%);width:210px;min-height:66px;margin:0;padding:12px 15px 17px;border-radius:0 0 80px 80px;background:#217de7;color:#fff;font-size:34px;font-weight:500;text-align:center;line-height:1.2}
.hs-auth-card .hs-auth-field{margin-bottom:12px}
.hs-auth-card .hs-auth-field label{display:block;margin:0 0 6px;font-size:16px;font-weight:500;letter-spacing:0;color:#0d1949}
.hs-auth-card .hs-auth-input{position:relative}
.hs-auth-card .hs-auth-input input{display:block;width:100%;height:43px;padding:9px 13px;border:1px solid #a8b5d6;border-radius:5px;font-size:15px;color:#17264e;background:white;box-sizing:border-box}
.hs-auth-card .hs-auth-input.has-icon input{padding-left:42px}
.hs-auth-card .hs-auth-input .hs-auth-icon{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:#7b88a8;font-size:17px;pointer-events:none}
.hs-auth-card .hs-auth-input input::placeholder{color:#7785a6}
.hs-auth-card .hs-auth-hint{font-size:13px;margin:6px 0 0;color:#14204e}
.hs-auth-card .hs-auth-options{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:22px 0 14px;font-size:11px}
.hs-auth-card .hs-auth-remember{display:flex;align-items:center;gap:6px;margin:0;font-size:11px;font-weight:400;white-space:nowrap}
.hs-auth-card .hs-auth-remember input{width:16px;height:16px;margin:0;accent-color:#217de7}
.hs-auth-card .hs-auth-link{color:#566b9c;text-decoration:none}
.hs-auth-card .hs-auth-link:hover{text-decoration:underline}
.hs-auth-card .hs-auth-submit{display:block;width:100%;height:42px;margin:0;padding:8px;border:0;border-radius:5px;background:#217de7;color:#fff;font-size:16px;font-weight:600;cursor:pointer}
.hs-auth-card .hs-auth-submit:hover{background:#176cd0}
.hs-auth-card .hs-auth-switch{margin:24px 0 0;text-align:center;font-size:12px;color:#586c9b}
.hs-auth-card .hs-auth-switch a{color:#526795;text-decoration:none}
.hs-auth-card .hs-auth-switch a:hover{text-decoration:underline}
@media(max-width:560px){.hs-auth-wrap{padding:16px 0 30px}.hs-auth-card.hs-form{padding:90px 24px 35px;min-height:520px}.hs-auth-card .hs-auth-title{width:190px;font-size:30px}}
</style>
<div class="hs-auth-wrap">
 <section class="hs-form hs-auth-card" aria-label="{{ $mode==='login'?'Login':'Register' }}">
  <h2 class="hs-auth-title">{{ $mode==='login'?'Login':'Register' }}</h2>
  <form method="post" action="{{ $mode==='login'?route('login'):route('register') }}">
   @csrf
   @if($mode==='register')
    <div class="hs-auth-field"><label for="auth-name">Name</label><div class="hs-auth-input"><input id="auth-name" name="name" type="text" value="{{ old('name') }}" placeholder="Your Name" autocomplete="name" required></div></div>
    <div class="hs-auth-field"><label for="auth-phone">Phone</label><div class="hs-auth-input"><input id="auth-phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel"></div></div>
   @endif
   <div class="hs-auth-field"><label for="auth-email">E-mail</label><div class="hs-auth-input has-icon"><i class="fa-solid fa-envelope hs-auth-icon" aria-hidden="true"></i><input id="auth-email" type="email" name="email" value="{{ old('email') }}" placeholder="mail@example.com" autocomplete="email" required></div></div>
   <div class="hs-auth-field"><label for="auth-password">Password</label><div class="hs-auth-input has-icon"><i class="fa-solid fa-lock hs-auth-icon" aria-hidden="true"></i><input id="auth-password" type="password" name="password" placeholder="••••••••" autocomplete="{{ $mode==='login'?'current-password':'new-password' }}" required minlength="8"></div><p class="hs-auth-hint">Minimum of 8 characters</p></div>
   @if($mode==='register')
    <div class="hs-auth-field"><label for="auth-confirm">Confirm Password</label><div class="hs-auth-input has-icon"><i class="fa-solid fa-lock hs-auth-icon" aria-hidden="true"></i><input id="auth-confirm" type="password" name="password_confirmation" placeholder="••••••••" autocomplete="new-password" required minlength="8"></div></div>
   @endif
   <div class="hs-auth-options"><label class="hs-auth-remember"><input type="checkbox" name="remember" value="1" {{ old('remember')?'checked':'' }}>Remember me</label><span></span></div>
   <button class="hs-auth-submit" type="submit">{{ $mode==='login'?'Login':'Register' }}</button>
  </form>
  <p class="hs-auth-switch">{{ $mode==='login'?"haven't an account?":"Already have an account?" }} <a href="{{ $mode==='login'?route('register'):route('login') }}">{{ $mode==='login'?'Register':'Login' }}</a></p>
 </section>
</div>
@endsection
