@if (request()->route()->named('movies.edit') ||
        request()->route()->named('movies.create'))
    <script src="{{ asset('/utils/ckeditor/build/ckeditor.js') }}"></script>
    <script src="{{ asset('/iframe/movie.js') }}"></script>
@endif
