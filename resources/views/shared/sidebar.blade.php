<div class="text-white font-bold "><!-- Link do Panelu -->
    <a href="{{ route('games.dashboard') }}" class="flex items-center p-2 hover:bg-gray-600 rounded transition duration-150 ease-in-out">
        <span class="mr-2 text-xl"><i class="fas fa-home"></i></span>
        Panel
    </a>

    <!-- Nagłówek "Konto" -->
    <div class="text-gray-500 uppercase tracking-wide font-bold mt-4 mb-2">Konto</div>

    <!-- Linki w sekcji "Konto" -->
    <nav class="space-y-2">
        {{--    <a href="{{ route('me.profile') }}" class="block p-2 hover:bg-gray-200 rounded transition duration-150 ease-in-out">Profil</a>--}}
            <a href="{{ route('user.games.list') }}" class="block p-2 hover:bg-gray-200 rounded transition duration-150 ease-in-out">Gry</a>
    </nav>

    <!-- Nagłówek "Gry" -->
    <div class="text-gray-500 uppercase tracking-wide font-bold mt-4 mb-2">Gry</div>

    <!-- Linki w sekcji "Gry" -->
    <nav class="space-y-2 text-gray-100 font-bold" >
        <a href="{{ route('games.dashboard') }}" class="block p-2 hover:bg-gray-600 rounded transition duration-150 ease-in-out">Dashboard</a>
        <a href="{{ route('games.list') }}" class="block p-2 hover:bg-gray-600 rounded transition duration-150 ease-in-out">Katalog</a>
    </nav>

    @can('admin-level')
        <!-- Nagłówek "Admin panel" -->
        <div class="text-gray-500 uppercase tracking-wide font-bold mt-4 mb-2">Admin panel</div>

        <!-- Linki w sekcji "Admin panel" -->
        <nav class="space-y-2">
            {{--        <a href="{{ route('get.users') }}" class="block p-2 hover:bg-gray-200 rounded transition duration-150 ease-in-out">Użytkownicy</a>--}}
        </nav>
    @endcan

</div>
