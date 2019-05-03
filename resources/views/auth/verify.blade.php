@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi Email Anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link Verifikasi telah dikirim ke alamat email anda.') }}
                        </div>
                    @endif

                    {{ __('Sebelum Melanjutkan, silahkan cek email anda untuk link verifikasi.') }}
                    {{ __('Jika tidak menerima email') }}, <a href="{{ route('verification.resend') }}">{{ __('klik disini untuk mengirim kembali') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
