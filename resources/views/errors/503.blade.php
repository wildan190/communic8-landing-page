<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Unavailable</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f3f4f6;
            font-family: sans-serif;
        }
        .container {
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
            max-height: 80vh;
        }
        h1 {
            font-size: 2rem;
            margin-top: 1rem;
            color: #374151;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('assets/img/503.jpeg') }}" alt="Service Unavailable">
        <h1>Service Unavailable</h1>
        <p>The server is temporarily unable to handle the request.</p>
    </div>
</body>
</html>
