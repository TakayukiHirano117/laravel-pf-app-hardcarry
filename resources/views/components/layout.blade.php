<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'HardCarry.com' }}</title>
    <style>
        [x-cloak] { 
            display: none !important; 
        }
    </style>
    <script src="https://kit.fontawesome.com/92dcc31514.js" crossorigin="anonymous"></script>
</head>
<body>
  {{ $slot }}
</body>
</html>
