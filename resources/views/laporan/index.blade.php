@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Laporan Banjir</h1>

        @forelse ($laporan as $item)
            @include('partials.laporan-card', [
                'laporan' => $item
            ])
        @empty
            <p>Belum ada laporan banjir.</p>
        @endforelse

        <a href="{{ route('form') }}">
            Kembali ke Form
        </a>
    </div>
@endsection

