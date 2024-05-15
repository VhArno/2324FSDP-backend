<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Specialisatie keuzetest resultaat</title>
    </head>
    <body class="antialiased">
        <p>Resultaat: {{ $specialisation->name }}</p>
    </body>
</html>
