<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ asset('css/styles.globals.css') }}>
    <title>SuperGestão - @yield('title')</title>
</head>

<body>
    <main>
        <section class="app">
            @yield('content')
        </section>
    </main>
    @include('layouts.block.footer')
</body>

</html>
