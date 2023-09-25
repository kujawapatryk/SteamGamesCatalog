

@extends('layouts.main')

@section('content')
    <div class="mt-3 flex flex-wrap">
        <!-- Karty -->
        @foreach ([
            ['title' => 'Liczba gier', 'value' => $stats['count'], 'icon' => 'fa-gamepad'],
            ['title' => 'Liczba gier 70+', 'value' => $stats['countScoreGtSeventy'], 'icon' => 'fa-star-half-alt'],
            ['title' => 'Średnia ocena', 'value' => $stats['avg'], 'icon' => 'fa-thermometer-half'],
            ['title' => 'Maksymalna ocena', 'value' => $stats['max'], 'icon' => 'fa-thermometer-full'],
            ['title' => 'Minimalna ocena', 'value' => $stats['min'], 'icon' => 'fa-thermometer-empty']
        ] as $card)
            <div class="w-full md:w-1/2 xl:w-1/4 p-2">
                <div class="bg-white shadow-sm p-4 h-full">
                    <div class="flex items-center">
                        <div class="flex-grow">
                            <div class="text-xs font-bold text-primary uppercase mb-1">{{ $card['title'] }}</div>
                            <div class="text-xl font-bold text-gray-800">{{ $card['value'] }}</div>
                        </div>
                        <div>
                            <i class="fas {{ $card['icon'] }} text-2xl text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tabela statystyki ocen -->
    <div class="card mt-4">
        <div class="bg-gray-200 p-4"><i class="fas fa-table mr-2"></i>Statystyka ocen</div>
        <div class="p-4">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead>
                    <tr>
                        <th class="border p-2">Ocena</th>
                        <th class="border p-2">Liczba gier z oceną</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($scoreStats ?? [] as $statRow)
                        <tr>
                            <td class="border p-2">{{ $statRow->metacritic_score }}</td>
                            <td class="border p-2">{{ $statRow->count }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tabela Best of the best -->
    <div class="card mt-4 mb-3">
        <div class="bg-gray-200 p-4"><i class="fas fa-table mr-2"></i>Best of the best</div>
        <div class="p-4">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead>
                    <tr>
                        <th class="border p-2">Lp</th>
                        <th class="border p-2">Tytuł</th>
                        <th class="border p-2">Ocena</th>
                        <th class="border p-2">Steam Id</th>
                        <th class="border p-2">Kategoria</th>
                        <th class="border p-2">Opcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bestGames ?? [] as $game)
                        <tr>
                            <td class="border p-2">{{ $loop->iteration }}</td>
                            <td class="border p-2">{{ $game->name }}</td>
                            <td class="border p-2">{{ $game->metacritic_score }}</td>
                            <td class="border p-2">{{ $game->steam_appid }}</td>
                            <td class="border p-2">{{ $game->genres->implode('name', ', ') }}</td>
                            <td class="border p-2">
                                <a href="{{ route('games.show', ['game' => $game->id]) }}" class="text-blue-500 hover:underline">Szczegóły</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection






{{--@extends('layout.main')--}}

{{--@section('content')--}}
{{--    <div class="row mt-3">--}}
{{--        <div class="col-x col-xl-3 col-md-6 mb-4">--}}
{{--            <div class="card border-left shadow-sm py-2 h-100">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row no-gutters align-items-center">--}}
{{--                        <div class="col mr-2">--}}
{{--                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Liczba gier</div>--}}
{{--                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['count'] }}</div>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto">--}}
{{--                            <i class="fas fa-gamepad fa-2x text-gray-300"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-3 col-md-6 mb-4">--}}
{{--            <div class="card border-left-primary shadow-sm py-2 h-100">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row no-gutters align-items-center">--}}
{{--                        <div class="col mr-2">--}}
{{--                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Liczba gier 70+</div>--}}
{{--                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['countScoreGtSeventy'] }}</div>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto">--}}
{{--                            <i class="fas fa-star-half-alt fa-2x text-gray-300"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <div class="col-xl-3 col-md-6 mb-4">--}}
{{--            <div class="card border-left-primary shadow-sm py-2 h-100">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row no-gutters align-items-center">--}}
{{--                        <div class="col mr-2">--}}
{{--                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Średnia ocena</div>--}}
{{--                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['avg'] }}</div>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto">--}}
{{--                            <i class="fas fa-thermometer-half fa-2x text-gray-300"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-xl-3 col-md-6 mb-4">--}}
{{--            <div class="card border-left-primary shadow-sm py-2 h-100">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row no-gutters align-items-center">--}}
{{--                        <div class="col mr-2">--}}
{{--                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Maksymalna ocena</div>--}}
{{--                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['max'] }}</div>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto">--}}
{{--                            <i class="fas fa-thermometer-full fa-2x text-gray-300"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-xl-3 col-md-6 mb-4">--}}
{{--            <div class="card border-left-primary shadow-sm py-2 h-100">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row no-gutters align-items-center">--}}
{{--                        <div class="col mr-2">--}}
{{--                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Minimalna ocena</div>--}}
{{--                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['min'] }}</div>--}}
{{--                        </div>--}}
{{--                        <div class="col-auto">--}}
{{--                            <i class="fas fa-thermometer-empty fa-2x text-gray-300"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="card">--}}
{{--        <div class="card-header"><i class="fas fa-table mr-1"></i>Statystyka ocen</div>--}}
{{--        <div class="card-body">--}}
{{--            <div class="table-responsive">--}}
{{--                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Ocena</th>--}}
{{--                        <th>Liczba gier z oceną</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tfoot>--}}
{{--                    <tbody>--}}
{{--                    @foreach($scoreStats ?? [] as $statRow)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $statRow->score }}</td>--}}
{{--                            <td>{{ $statRow->count }}</td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="card mb-3">--}}
{{--        <div class="card-header"><i class="fas fa-table mr-1"></i>Best of the best</div>--}}
{{--        <div class="card-body">--}}
{{--            <div class="table-responsive">--}}
{{--                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Lp</th>--}}
{{--                        <th>Tytuł</th>--}}
{{--                        <th>Ocena</th>--}}
{{--                        <th>Steam Id</th>--}}
{{--                        <th>Kategoria</th>--}}
{{--                        <th>Opcje</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($bestGames ?? [] as $game)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $loop->iteration }}</td>--}}
{{--                            <td>{{ $game->name }}</td>--}}
{{--                            <td>{{ $game->score }}</td>--}}
{{--                            <td>{{ $game->steamId }}</td>--}}
{{--                            <td>{{ $game->genres->implode('name', ', ') }}</td>--}}
{{--                            <td>--}}
{{--                                <a href="{{ route('games.show', ['game' => $game->id]) }}">Szczegóły</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
