<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content=""/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div style="max-width: 1280px; margin: 0 auto;" >

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

        <div class="flex">
            <aside class="w-64  bg-gray-800">
                @section('sidebar')
                    <div class="p-4">
                        @include('shared.sidebar')
                    </div>

                @show
            </aside>
            <main class="flex-1 p-8">
                <div class="container mx-auto">
                    @include('shared.messages')
                    @yield('content')
                </div>
            </main>
        </div>
        <footer class="bg-gray-200 p-4 mt-auto">
            <div class="container mx-auto">
            </div>
        </footer>

        </div>
    </div>
</body>
</html>




