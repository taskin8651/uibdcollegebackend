@extends('layouts.app')

@section('styles')
<style>
    body { font-family: Inter, sans-serif; background: #eef5fb; }
    .auth-shell {
        min-height: 100vh;
        display: grid;
        grid-template-columns: minmax(0, 1.08fr) minmax(420px, .92fr);
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
            linear-gradient(135deg, rgba(18, 63, 140, .94), rgba(9, 71, 82, .84)),
            url("{{ asset('assets/img/bdcpat_img_001.jpg') }}") center/cover;
    }
    .auth-visual::after {
        content: "";
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 80% 15%, rgba(255,255,255,.18), transparent 28%);
        pointer-events: none;
    }
    .auth-brand,
    .auth-copy,
    .auth-stats { position: relative; z-index: 1; }
    .auth-brand {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .auth-brand img {
        width: 54px;
        height: 54px;
        object-fit: contain;
        background: #fff;
        border-radius: 12px;
        padding: 7px;
    }
    .auth-brand strong { display: block; font-size: 18px; font-weight: 900; }
    .auth-brand span { display: block; font-size: 12px; opacity: .82; margin-top: 2px; }
    .auth-copy { max-width: 700px; }
    .auth-copy .kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 11px;
        border-radius: 999px;
        background: rgba(255,255,255,.15);
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .04em;
    }
    .auth-copy h1 {
        margin: 18px 0 12px;
        font-size: 44px;
        line-height: 1.08;
        font-weight: 900;
        letter-spacing: 0;
    }
    .auth-copy p {
        max-width: 620px;
        margin: 0;
        color: rgba(255,255,255,.84);
        line-height: 1.75;
        font-size: 15px;
    }
    .auth-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
        max-width: 680px;
    }
    .auth-stat {
        padding: 14px;
        border-radius: 14px;
        background: rgba(255,255,255,.13);
        border: 1px solid rgba(255,255,255,.18);
        backdrop-filter: blur(8px);
    }
    .auth-stat span {
        display: block;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .05em;
        opacity: .72;
        font-weight: 900;
    }
    .auth-stat strong {
        display: block;
        margin-top: 5px;
        font-size: 20px;
        font-weight: 900;
    }
    .auth-panel {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 34px;
    }
    .auth-card {
        width: 100%;
        max-width: 470px;
        background: #fff;
        border: 1px solid #dbe7f2;
        border-radius: 18px;
        box-shadow: 0 24px 70px rgba(15, 23, 42, .14);
        padding: 30px;
    }
    .auth-card-head { margin-bottom: 22px; }
    .auth-card-head a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #123f8c;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
        margin-bottom: 18px;
    }
    .auth-card-head h2 {
        margin: 0;
        color: #0f172a;
        font-size: 28px;
        font-weight: 900;
        letter-spacing: 0;
    }
    .auth-card-head p {
        margin: 8px 0 0;
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }
    .auth-alert {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 14px;
        border-radius: 10px;
        background: #eff6ff;
        color: #1d4ed8;
        border: 1px solid #bfdbfe;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 16px;
    }
    .field { margin-bottom: 16px; }
    .field label {
        display: block;
        margin-bottom: 7px;
        color: #334155;
        font-size: 13px;
        font-weight: 800;
    }
    .input-wrap { position: relative; }
    .input-wrap i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 14px;
    }
    .auth-input {
        width: 100%;
        height: 46px;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        background: #f8fafc;
        padding: 0 14px 0 42px;
        color: #0f172a;
        font-size: 14px;
        font-weight: 600;
        outline: none;
        transition: border-color .18s, background .18s, box-shadow .18s;
    }
    .auth-input:focus {
        border-color: #123f8c;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(18,63,140,.09);
    }
    .auth-input.error { border-color: #ef4444; background: #fff7f7; }
    .field-error {
        margin: 7px 0 0;
        color: #dc2626;
        font-size: 12px;
        font-weight: 700;
    }
    .form-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin: 4px 0 18px;
    }
    .remember {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #475569;
        font-size: 13px;
        font-weight: 700;
    }
    .remember input { width: 16px; height: 16px; accent-color: #123f8c; }
    .auth-link {
        color: #123f8c;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
    }
    .auth-btn {
        width: 100%;
        height: 48px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        border: 0;
        border-radius: 10px;
        color: #fff;
        background: #123f8c;
        font-size: 14px;
        font-weight: 900;
        cursor: pointer;
        box-shadow: 0 12px 28px rgba(18,63,140,.24);
    }
    .auth-footer {
        margin-top: 18px;
        text-align: center;
        color: #64748b;
        font-size: 13px;
        font-weight: 700;
    }
    @media (max-width: 980px) {
        .auth-shell { grid-template-columns: 1fr; }
        .auth-visual { min-height: 420px; }
        .auth-panel { min-height: auto; }
    }
    @media (max-width: 640px) {
        .auth-visual { padding: 24px; min-height: 360px; }
        .auth-copy h1 { font-size: 30px; }
        .auth-stats { grid-template-columns: 1fr; }
        .auth-panel { padding: 18px; }
        .auth-card { padding: 22px; }
        .form-row { align-items: flex-start; flex-direction: column; }
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
            <span class="kicker"><i class="fas fa-shield-halved"></i> Secure Admin Portal</span>
            <h1>Manage college content with clarity and control.</h1>
            <p>
                Login to update notices, departments, events, feedback, reports, website settings and academic content from one connected dashboard.
            </p>
        </div>

        <div class="auth-stats">
            <div class="auth-stat"><span>CMS</span><strong>Dynamic</strong></div>
            <div class="auth-stat"><span>Access</span><strong>Role Based</strong></div>
            <div class="auth-stat"><span>Portal</span><strong>Secure</strong></div>
        </div>
    </section>

    <section class="auth-panel">
        <div class="auth-card">
            <div class="auth-card-head">
                <a href="{{ route('frontend.home') }}"><i class="fas fa-arrow-left"></i> Back to website</a>
                <h2>{{ trans('global.login') }}</h2>
                <p>Use your administrator credentials to continue to the dashboard.</p>
            </div>

            @if(session('message'))
                <div class="auth-alert">
                    <i class="fas fa-circle-info"></i>
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email">{{ trans('global.login_email') }}</label>
                    <div class="input-wrap">
                        <i class="fas fa-envelope"></i>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="email"
                               class="auth-input {{ $errors->has('email') ? 'error' : '' }}"
                               placeholder="admin@example.com">
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
                               autocomplete="current-password"
                               class="auth-input {{ $errors->has('password') ? 'error' : '' }}"
                               placeholder="Enter your password">
                    </div>
                    @if($errors->has('password'))
                        <p class="field-error">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="form-row">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        {{ trans('global.remember_me') }}
                    </label>

                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="auth-link">
                            {{ trans('global.forgot_password') }}
                        </a>
                    @endif
                </div>

                <button type="submit" class="auth-btn">
                    <i class="fas fa-right-to-bracket"></i>
                    {{ trans('global.login') }}
                </button>
            </form>

            @if(Route::has('register'))
                <div class="auth-footer">
                    Need an account?
                    <a href="{{ route('register') }}" class="auth-link">{{ trans('global.register') }}</a>
                </div>
            @endif
        </div>
    </section>
</main>
@endsection
