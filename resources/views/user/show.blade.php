@extends('layouts.main')

@section('title', 'Użytkownik')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <h5 class="text-xl font-bold mb-4">{{ $user->name }}</h5>
        <div class="space-y-4">
            <ul class="list-disc list-inside">
                <li>Id: {{ $user->id }}</li>
                <li>Email: {{ $user->email }}</li>
                <li>Nazwa: {{ $user->name }}</li>
                <li>Telefon: {{ $user->phone }}</li>
            </ul>

{{--            <a href="{{ route('user.list') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">--}}
{{--                Lista użytkowników--}}
{{--            </a>--}}
            <x-btn label="Lista użytkowników" url="{{ route('user.list') }}" isLink="true"></x-btn>
        </div>
    </div>
@endsection
