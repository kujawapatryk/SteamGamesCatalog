@extends('layouts.main')

@section('content')
    <div class="bg-white mt-6 rounded shadow">
        <div class="p-4 border-b">
            <div class="flex items-center">
                <i class="fas fa-table mr-2 text-xl"></i>
                <span>Gry</span>
            </div>
        </div>
        <div class="p-4">

            <form action="{{ route('games.list') }}" class="flex flex-wrap items-center">
                <label for="phrase" class="mr-2 mb-1">Szukana fraza:</label>
                <input type="text" name="phrase" placeholder="" value="{{ $phrase ?? '' }}" class="form-input mr-2 mb-1">
                @php $type = $type ?? ''; @endphp
                <select name="type" class="form-select mr-2 mb-1">
                    <option @if ($type == 'all') selected @endif value="all">Wszystkie rodzaje</option>
                    <option @if ($type == 'game') selected @endif value="game">Gry</option>
                    <option @if ($type == 'dlc') selected @endif value="dlc">Dlc</option>
                    <option @if ($type == 'demo') selected @endif value="demo">Demo</option>
                    <option @if ($type == 'episode') selected @endif value="episode">Epizody</option>
                    <option @if ($type == 'mod') selected @endif value="mod">Mody</option>
                    <option @if ($type == 'movie') selected @endif value="movie">Filmy</option>
                    <option @if ($type == 'music') selected @endif value="music">Muzyka</option>
                    <option @if ($type == 'series') selected @endif value="series">Serie</option>
                    <option @if ($type == 'video') selected @endif value="video">Video</option>
                </select>
                <button type="submit" class=" bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-5 rounded focus:outline-none focus:shadow-outline-gray active:bg-gray-800">
                    Wyszukaj
                </button>
            </form>

            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">Id</th>
                        <th class="px-4 py-2">Tytuł</th>
                        <th class="px-4 py-2">Typ</th>
                        <th class="px-4 py-2">Ocena</th>
                        <th class="px-4 py-2">Gatunek</th>
                        <th class="px-4 py-2">Opcje</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th class="px-4 py-2">Id</th>
                        <th class="px-4 py-2">Tytuł</th>
                        <th class="px-4 py-2">Typ</th>
                        <th class="px-4 py-2">Ocena</th>
                        <th class="px-4 py-2">Gatunek</th>
                        <th class="px-4 py-2">Opcje</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($games ?? [] as $game)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $game->id }}</td>
                            <td class="px-4 py-2">{{ $game->name }}</td>
                            <td class="px-4 py-2">{{ $game->type}}</td>
                            <td class="px-4 py-2">{{ $game->score ?? 'brak' }}</td>
                            <td class="px-4 py-2">{{ $game->genres->implode('name', ', ') }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('games.show', ['game' => $game->id]) }}" class="text-blue-500 hover:underline">Szczegóły</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4 w-auto" >
                {{ $games->links() }}
            </div>
        </div>
    </div>
@endsection
