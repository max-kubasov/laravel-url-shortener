@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message')
    <div class="p-6 text-center">
        <h1 class="text-2xl font-bold text-gray-800">Slow down, friend! 🛑</h1>
        <p class="mt-4 text-gray-600">You are creating links too fast.</p>
        <p class="mt-2 text-sm text-gray-500">Please wait a minute and try again.</p>
        <a href="{{ url('/') }}" class="mt-6 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg">
            Back to Home
        </a>
    </div>
@endsection
