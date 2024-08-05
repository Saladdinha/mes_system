<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @section('title')
        @show
    </title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="font-content">
    <header class="flex font-title py-3 px-2 text-neutralwhite bg-neutralblack sticky top-0 z-10">
        <x-header>

        </x-header>
    </header>
    <div class="page-content flex flex-row relative">
        <aside
            class="py-3 px-3 h-92-1 sticky top-12 text-neutralwhite bg-neutralblack max-w-64 sidemenu w-20 duration-300 ease-linear transition-all max-md:absolute max-md:top-0">
            <x-side-menu>

            </x-side-menu>
        </aside>
        <main class="w-full p-3 bg-neutralwhite flex gap-4">
            @section('content')
        </main>
    </div>
    @show
</body>

</html>