@extends('layouts.main')

@section('content')
<div class="card mt-3">
    @if(!empty($game))
        <h5 class="card-header">
            {{ $game->name }}
            @auth
                @if ($userHasGame)
                    <form class="float-right m-0" method="post" action="{{ route('user.games.remove') }}">
                        @method('delete')
                        @csrf
                        <div class="flex items-center space-x-4">
                            <input type="hidden" name="gameId" value="{{ $game->id }}">
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
        </h5>
        <div class="card-body">

            <ul>
                <li>Id: {{ $game->id }}</li>
                <li>Nazwa: {{ $game->name }}</li>
                <li>Wydawca: {{ $game->publishers->implode('name', ', ') }}</li>
                <li>Gatunek:{{ $game->genres->implode('name', ', ') }}</li>
            </ul>
            <div class="my-4">
                <h4>Krótki opis</h4>
                <div class="mx-2">{!! $game->short_description !!}</div>
            </div>

            <div class="my-4">
                <h4>Opis</h4>
                <div class="mx-2">{!! $game->description !!}</div>
            </div>

            <div class="my-4">
                <h4>About</h4>
                <div class="mx-2">{!! $game->about !!}</div>
            </div>

            <x-btn label="Lista gier" isLink="true" url="{{ route('games.list') }}"></x-btn>

        </div>
    @else
        <h5 class="card-header">Brak danych do wyświetlenia</h5>
    @endif
</div>
@endsection
