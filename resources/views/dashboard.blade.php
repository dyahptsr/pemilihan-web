@extends('master')
@section('home')
    <div class="countdown">
                    <h3>Waktu Menuju Pemilihan:</h3>
                    <div id="countdown-timer">
                        <div><span id="days">00</span><span>Hari</span></div>
                        <div><span id="hours">00</span><span>Jam</span></div>
                        <div><span id="minutes">00</span><span>Menit</span></div>
                        <div><span id="seconds">00</span><span>Detik</span></div>
                    </div>
                </div>
                
                <a href="/login" class="btn">login</a>
                <p style="margin-top: 0.8rem; font-size: 0.8rem; color: var(--gray-color);">*Hanya anggota terdaftar yang dapat berpartisipasi</p>
            </div>
@endsection