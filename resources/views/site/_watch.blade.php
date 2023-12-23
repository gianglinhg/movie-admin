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

    <video id=example-video width=600 height=300 class="video-js vjs-default-skin" controls>
        <source
           src="https://hdbo.opstream5.com/20230114/29210_45f6d896/index.m3u8"
           type="application/x-mpegURL">
      </video>
    <script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
<script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
      <script>
      var player = videojs('example-video');
      player.play();
      </script>

</body>
</html>
