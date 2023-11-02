@if (request()->route()->named('movies.edit') || request()->route()->named('movies.create'))
    <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/4/tinymce.min.js'></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
    <script src="{{ asset('/iframe/movie.js') }}"></script>
    {{-- <script src="{{ asset('/iframe/summernote.js') }}"></script> --}}
    <script src="{{ asset('/iframe/tiny.js') }}"></script>
@endif
