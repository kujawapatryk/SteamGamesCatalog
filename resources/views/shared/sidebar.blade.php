<div class="text-white font-bold ">
    <!-- Link do Panelu -->
    <x-navigate-button router="{{ route('dashboard') }}">
        <span class="mr-2 text-xl"><i class="fas fa-home"></i></span>
        Panel
    </x-navigate-button>

    <!-- Nagłówek "Gry" -->
    <div class="text-gray-500 uppercase tracking-wide font-bold mt-4 mb-2">Gry</div>

    <!-- Linki w sekcji "Gry" -->
    <nav class="space-y-2 text-gray-100 font-bold" >
        <x-navigate-button router="{{ route('dashboard') }}">
            Dashboard
        </x-navigate-button>
        <x-navigate-button router="{{ route('games.list') }}">
            Katalog
        </x-navigate-button>
    </nav>
    @auth
    <!-- Nagłówek "Konto" -->
    <div class="text-gray-500 uppercase tracking-wide font-bold mt-4 mb-2">Konto</div>

    <!-- Linki w sekcji "Konto" -->
    <nav class="space-y-2">
        <x-navigate-button router="{{ route('profile.edit') }}">
            Profil
        </x-navigate-button>
        <x-navigate-button router="{{ route('user.games.list') }}">
            Gry
        </x-navigate-button>
    </nav>


    @can('admin-level')
        <!-- Nagłówek "Admin panel" -->
        <div class="text-gray-500 uppercase tracking-wide font-bold mt-4 mb-2">Admin panel</div>

        <!-- Linki w sekcji "Admin panel" -->
        <nav class="space-y-2">
            <x-navigate-button router="{{ route('user.list') }}">
                Użytkownicy
            </x-navigate-button>
        </nav>
    @endcan
    @endauth

</div>
