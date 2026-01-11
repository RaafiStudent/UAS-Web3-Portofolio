<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>{{ $title ?? 'Muhammad Raafi Juliyanto | Portfolio' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .bg-gradient-custom { background-image: linear-gradient(to right, #448AFF, #6b46c1, #a060e8); }
        .bg-gradient-send { background-image: linear-gradient(to right, #00BCD4, #EC407A); }
        .text-gradient-home { 
            background-image: linear-gradient(to right, #00BCD4, #448AFF); 
            -webkit-background-clip: text;
            color: transparent;
        }
    </style>
</head>