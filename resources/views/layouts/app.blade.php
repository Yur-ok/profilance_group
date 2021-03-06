<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Profilance Group - link shortener</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body class="">
<div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100vh">
    <header class="text-center">
        <a href="{{ route('main') }}" class="text-decoration-none">
            <h1 style="font-family: Helvetica, Nunito, sans-serif">Profilance Group</h1>
            <h2>Link shortener</h2>
        </a>
    </header>
    <div class="" style="width: 100%;">
        @yield('form')
    </div>
    <div class="mt-8">
        @yield('result')
    </div>
</div>
</body>
<script>
    async function toClipboard() {
        let copyText = $('.result').text();
        let data = [new ClipboardItem({"text/plain": new Blob([copyText], {type: "text/plain"})})];
        await navigator.clipboard.write(data);
        alert(`Ссылка: ${copyText} успешно скопирована!`);
    }
</script>
</html>

