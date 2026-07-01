@extends('layouts.app')

@section('styles')
<style>
    body { font-family: Inter, sans-serif; background: #eef5fb; }
    .auth-shell {
        min-height: 100vh;
        display: grid;
        grid-template-columns: minmax(0, 1.02fr) minmax(440px, .98fr);
        background: #eef5fb;
    }
    .auth-visual {
        position: relative;
        min-height: 100vh;
        padding: 34px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        color: #fff;
        overflow: hidden;
        background:
            linear-gradient(135deg, rgba(18, 63, 140, .94), rgba(15, 118, 110, .86)),
            url("{{ asset('assets/img/bdcpat_202605201518.jpg') }}") center/cover;
    }
    .auth-brand { display: flex; align-items: center; gap: 12px; position: relative; z-index: 1; }
    .auth-brand img { width: 54px; height: 54px; object-fit: contain; background: #fff; border-radius: 12px; padding: 7px; }
    .auth-brand strong { display: block; font-size: 18px; font-weight: 900; }
    .auth-brand span { display: block; font-size: 12px; opacity: .82; margin-top: 2px; }
    .auth-copy { max-width: 680px; position: relative; z-index: 1; }
    .auth-copy .kicker {
        display: inline-flex; align-items: center; gap: 8px; padding: 7px 11px;
        border-radius: 999px; background: rgba(255,255,255,.15);
        font-size: 12px; font-weight: 900; text-transform: uppercase; letter-spacing: .04em;
    }
    .auth-copy h1 { margin: 18px 0 12px; font-size: 42px; line-height: 1.08; font-weight: 900; letter-spacing: 0; }
    .auth-copy p { margin: 0; color: rgba(255,255,255,.84); line-height: 1.75; font-size: 15px; }
    .auth-points { display: grid; gap: 10px; position: relative; z-index: 1; max-width: 560px; }
    .auth-points span {
        display: flex; align-items: center; gap: 10px; padding: 12px 14px; border-radius: 12px;
        background: rgba(255,255,255,.13); border: 1px solid rgba(255,255,255,.18);
        color: rgba(255,255,255,.9); font-size: 13px; font-weight: 800;
    }
    .auth-panel { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 34px; }
    .auth-card {
        width: 100%; max-width: 500px; background: #fff; border: 1px solid #dbe7f2;
        border-radius: 18px; box-shadow: 0 24px 70px rgba(15, 23, 42, .14); padding: 30px;
    }
    .auth-card-head { margin-bottom: 22px; }
    .auth-card-head a { display: inline-flex; align-items: center; gap: 8px; color: #123f8c; font-size: 13px; font-weight: 800; text-decoration: none; margin-bottom: 18px; }
    .auth-card-head h2 { margin: 0; color: #0f172a; font-size: 28px; font-weight: 900; letter-spacing: 0; }
    .auth-card-head p { margin: 8px 0 0; color: #64748b; font-size: 14px; line-height: 1.6; }
    .field { margin-bottom: 15px; }
    .field label { display: block; margin-bottom: 7px; color: #334155; font-size: 13px; font-weight: 800; }
    .input-wrap { position: relative; }
    .input-wrap i { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 14px; }
    .auth-input {
        width: 100%; height: 46px; border-radius: 10px; border: 1px solid #cbd5e1;
        background: #f8fafc; padding: 0 14px 0 42px; color: #0f172a;
        font-size: 14px; font-weight: 600; outline: none; transition: border-color .18s, background .18s, box-shadow .18s;
    }
    .auth-input:focus { border-color: #123f8c; background: #fff; box-shadow: 0 0 0 4px rgba(18,63,140,.09); }
    .auth-input.error { border-color: #ef4444; background: #fff7f7; }
    .field-error { margin: 7px 0 0; color: #dc2626; font-size: 12px; font-weight: 700; }
    .auth-btn {
        width: 100%; height: 48px; display: inline-flex; align-items: center; justify-content: center; gap: 9px;
        border: 0; border-radius: 10px; color: #fff; background: #123f8c;
        font-size: 14px; font-weight: 900; cursor: pointer; box-shadow: 0 12px 28px rgba(18,63,140,.24); margin-top: 4px;
    }
    .auth-footer { margin-top: 18px; text-align: center; color: #64748b; font-size: 13px; font-weight: 700; }
    .auth-link { color: #123f8c; font-size: 13px; font-weight: 800; text-decoration: none; }
    @media (max-width: 980px) {
        .auth-shell { grid-template-columns: 1fr; }
        .auth-visual { min-height: 390px; }
        .auth-panel { min-height: auto; }
    }
    @media (max-width: 640px) {
        .auth-visual { padding: 24px; min-height: 330px; }
        .auth-copy h1 { font-size: 30px; }
        .auth-panel { padding: 18px; }
        .auth-card { padding: 22px; }
    }
</style>
@endsection

@section('content')
@php
    $setting = \App\Models\WebsiteSetting::first();
    $collegeName = optional($setting)->college_name ?: 'B.D. College, Patna';
    $affiliation = optional($setting)->affiliation_text ?: 'A Constituent Unit of Patliputra University, Patna';
    $logo = $setting ? $setting->mediaUrl('header_logo', 'assets/img/logo_bdcpat.png') : asset('assets/img/logo_bdcpat.png');
@endphp

<main class="auth-shell">
    <section class="auth-visual">
        <div class="auth-brand">
            <img src="{{ $logo }}" alt="{{ $collegeName }} logo">
            <div>
                <strong>{{ $collegeName }}</strong>
                <span>{{ $affiliation }}</span>
            </div>
        </div>

        <div class="auth-copy">
            <span class="kicker"><i class="fas fa-user-plus"></i> Account Access</span>
            <h1>Create access for the college CMS.</h1>
            <p>
                Registration creates a user account for the admin system. Roles and permissions can be managed from the dashboard after login.
            </p>
        </div>

        <div class="auth-points">
            <span><i class="fas fa-check-circle"></i> Role-based content management</span>
            <span><i class="fas fa-check-circle"></i> Secure dashboard access</span>
            <span><i class="fas fa-check-circle"></i> Connected website modules</span>
        </div>
    </section>

    <section class="auth-panel">
        <div class="auth-card">
            <div class="auth-card-head">
                <a href="{{ route('frontend.home') }}"><i class="fas fa-arrow-left"></i> Back to website</a>
                <h2>{{ trans('global.register') }}</h2>
                <p>Fill in the details below to create a new CMS user account.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field">
                    <label for="name">{{ trans('global.user_name') }}</label>
                    <div class="input-wrap">
                        <i class="fas fa-user"></i>
                        <input id="name"
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               autofocus
                               autocomplete="name"
                               class="auth-input {{ $errors->has('name') ? 'error' : '' }}"
                               placeholder="Full name">
                    </div>
                    @if($errors->has('name'))
                        <p class="field-error">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="email">{{ trans('global.login_email') }}</label>
                    <div class="input-wrap">
                        <i class="fas fa-envelope"></i>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autocomplete="email"
                               class="auth-input {{ $errors->has('email') ? 'error' : '' }}"
                               placeholder="name@example.com">
                    </div>
                    @if($errors->has('email'))
                        <p class="field-error">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="password">{{ trans('global.login_password') }}</label>
                    <div class="input-wrap">
                        <i class="fas fa-lock"></i>
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="new-password"
                               class="auth-input {{ $errors->has('password') ? 'error' : '' }}"
                               placeholder="Create password">
                    </div>
                    @if($errors->has('password'))
                        <p class="field-error">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label for="password_confirmation">{{ trans('global.login_password_confirmation') }}</label>
                    <div class="input-wrap">
                        <i class="fas fa-shield-halved"></i>
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               required
                               autocomplete="new-password"
                               class="auth-input"
                               placeholder="Confirm password">
                    </div>
                </div>

                <button type="submit" class="auth-btn">
                    <i class="fas fa-user-plus"></i>
                    {{ trans('global.register') }}
                </button>
            </form>

            <div class="auth-footer">
                Already have an account?
                <a href="{{ route('login') }}" class="auth-link">{{ trans('global.login') }}</a>
            </div>
        </div>
    </section>
</main>
@endsection
