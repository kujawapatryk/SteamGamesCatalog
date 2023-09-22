@extends('layouts.main')

@section('content')
    <div class="bg-white mt-3 p-6 rounded shadow">
        <div class="flex items-center mb-4">
            <i class="fas fa-table mr-1"></i>
            <span class="text-lg font-bold">Moje gry</span>
        </div>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Lp</th>
                    <th class="py-2 px-4 border-b">Tytuł</th>
                    <th class="py-2 px-4 border-b">Kategoria</th>
                    <th class="py-2 px-4 border-b">Ocena</th>
                    <th class="py-2 px-4 border-b">Twoja ocena</th>
                    <th class="py-2 px-4 border-b">Opcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($games ?? [] as $game)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $game->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $game->genres->implode('name', ', ') }}</td>
                        <td class="py-2 px-4 border-b">
                            {{ $game->score ?? 'brak' }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            <form class="m-0 flex items-start" method="post" action="{{ route('user.games.rate') }}">
                                @csrf
                                <input type="hidden" name="gameId" value="{{ $game->id }}">
                                <input
                                    class="form-input mb-2 mr-2"
                                    placeholder="ocena"
                                    name="rate"
                                    type="number"
                                    max="100"
                                    min="1"
                                    value="{{ $game->pivot->rate }}"
                                />
                                <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline-grey active:bg-gray-800">Oceń</button>
                            </form>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('games.show', ['game' => $game->id]) }}" class="text-blue-500 hover:underline">Szczegóły</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $games->links() }}
        </div>
    </div>
@endsection
