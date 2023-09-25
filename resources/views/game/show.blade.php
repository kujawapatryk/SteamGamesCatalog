@extends('layouts.main')

@section('content')
<div class="card mt-3">
    @if(!empty($game))
        <h1 class="text-3xl font-bold inline">
            {{ $game->name }}</h1>
            @auth
                @if ($userHasGame)
                    <form class="float-right m-0" method="post" action="{{ route('user.games.remove') }}">
                        @method('delete')
                        @csrf
                        <div class="flex items-center space-x-4">
                            <h2> <input type="hidden" name="gameId" value="{{ $game->id }}"> </h2>
                            <x-btn label="Usuń z listy"></x-btn>
                  </div>
                    </form>
                @else
                    <form class="float-right m-0" method="post" action="{{ route('user.games.add') }}">
                        @csrf
                        <div class="flex items-center space-x-4">
                            <input type="hidden" name="gameId" value="{{ $game->id }}">
                            <x-btn label="Dodaj do mojej listy"></x-btn>

                        </div>
                    </form>
                @endif
            @endauth

        <div class="card-body">

            <ul>
                <li><span class="text-lg font-bold">Id:</span> {{ $game->id }}</li>
                <li><span class="text-lg font-bold">Nazwa:</span> {{ $game->name }}</li>
                <li><span class="text-lg font-bold">Wydawca:</span> {{ $game->publishers->implode('name', ', ') }}</li>
                <li><span class="text-lg font-bold">Gatunek:</span>{{ $game->genres->implode('name', ', ') }}</li>
            </ul>
            <div class="my-4">
                <h4 class="text-xl font-bold">Krótki opis</h4>
                <div class="mx-2">{!! $game->short_description !!}</div>
            </div>

            <div class="my-4">
                <h4 class="text-xl font-bold">Opis</h4>
                <div class="mx-2">{!! $game->description !!}</div>
            </div>

            <div class="my-4">
                <h4 class="text-xl font-bold">About</h4>
                <div class="mx-2">{!! $game->about !!}</div>
            </div>

            <x-btn label="Lista gier" isLink="true" url="{{ route('games.list') }}"></x-btn>

        </div>
    @else
        <h5 class="card-header text-xxl font-bold">Brak danych do wyświetlenia</h5>
    @endif
</div>
@endsection
