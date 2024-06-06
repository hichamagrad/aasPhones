<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Document')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            width: 100%;
        }
    </style>
</head>
<body>

    @include('includes._header', ['groupedCategories' => $categories->groupBy('type')])
    
    <div class="content">
        @yield("content")
    </div>
    
    <footer>
        <p>AAS PHONES</p>
        <p>CONTACTS</p>
        <p>Tel: +222 6 0000000</p>
        <p>EMAIL: Example@Mail.Com</p>
        <p>Instagram: Aas_Phone</p>
        <p>&copy; Your Details Reserved</p>
    </footer>
</body>
</html>
