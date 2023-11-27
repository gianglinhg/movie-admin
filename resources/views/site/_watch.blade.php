<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ví dụ về IFrame với Div</title>
    <style>
        /* CSS để tùy chỉnh giao diện */
        .custom-iframe-container {
            border: 2px solid #ccc;
            padding: 10px;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Tùy chỉnh kích thước iframe */
        .custom-iframe {
            width: 100%;
            height: 1000px;
            border: none; /* Loại bỏ đường viền mặc định của iframe */
        }
    </style>
</head>
<body>

    <h2>{{ $movie->name }}</h2>

    <div class="custom-iframe-container">
        <iframe class="custom-iframe" src="{{ $movie->episodes[1]->link}}" frameborder="0"></iframe>
    </div>

</body>
</html>
