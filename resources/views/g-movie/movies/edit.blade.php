@extends('layouts.app')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#info-tab">Thông tin phim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#class-tab">Phân loại</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#episode-tab">Danh sách tập phim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#more-tab">Khác</a>
        </li>
    </ul>
    {!! Form::open(['route' => ['admin.movies.update', $movie->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
    <div class="tab-content w-75" id="movie-create">
        <div class="tab-pane fade show active" id="info-tab" role="tabpanel">
            <div class="row">
                <div class="col-md-6 form-group">
                    {!! Form::label('name', 'Tên phim', ['class' => 'required']) !!}
                    {!! Form::text('name', $movie->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('origin_name', 'Tên phim gốc', ['class' => 'required']) !!}
                    {!! Form::text('origin_name', $movie->origin_name, [
                        'id' => 'origin_name',
                        'class' => 'form-control',
                        'placeholder' => 'Tên phim gốc',
                    ]) !!}
                    <x-input-error class="mt-2" :messages="$errors->get('origin_name')" />
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Đường dẫn tĩnh') !!}
                {!! Form::text('slug', $movie->slug, ['id' => 'slug', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('poster_url', 'Poster url') !!}
                <div class="input-group">
                    {!! Form::text('poster_url', asset($movie->poster_url), ['id' => 'poster_url', 'class' => 'form-control']) !!}
                    <button type="button" class="btn btn-light btn-icon-text input-group-text" id="lfm-poster_url" data-input="poster_url">
                        <i class="mdi mdi-folder-image"></i> Image
                    </button>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('thumb_url', 'Thumb url') !!}
                <div class="input-group">
                    {!! Form::text('thumb_url', asset($movie->thumb_url), ['id' => 'thumb_url', 'class' => 'form-control']) !!}
                    <button type="button" class="btn btn-light btn-icon-text input-group-text" id="lfm-thumb_url" data-input="thumb_url">
                        <i class="mdi mdi-folder-image"></i> Image
                    </button>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Nội dung') !!}
                {!! Form::textarea('content', $movie->content, ['id' => 'ckeditor', 'class' => 'form-control my-editor', 'placeholder' => 'Nội dung']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('notify', 'Thông báo / Ghi chú') !!}
                {!! Form::text('notify', $movie->notify, ['id' => 'notify', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('showtimes', 'Lịch chiếu phim') !!}
                {!! Form::text('showtimes', $movie->showtimes, ['id' => 'showtimes', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('trailer_url', 'URL trailer youtube') !!}
                {!! Form::text('trailer_url', $movie->trailer_url, [
                    'id' => 'trailer_url',
                    'class' => 'form-control',
                    'placeholder' => 'Tên phim',
                ]) !!}
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    {!! Form::label('episode_time', 'Thời lượng tập phim') !!}
                    {!! Form::text('episode_time', $movie->episode_time, [
                        'id' => 'episode_time',
                        'class' => 'form-control',
                        'placeholder' => 'Tên phim',
                    ]) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('episode_current', 'Tập phim hiện tại') !!}
                    {!! Form::text('episode_current', $movie->episode_current, [
                        'id' => 'episode_current',
                        'class' => 'form-control',
                        'placeholder' => 'Tên phim',
                    ]) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('episode_total', 'Tổng số tập phim') !!}
                    {!! Form::text('episode_total', $movie->episode_total, [
                        'id' => 'episode_total',
                        'class' => 'form-control',
                        'placeholder' => 'Tên phim',
                    ]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    {!! Form::label('language', 'Ngôn ngữ') !!}
                    {!! Form::text('language', $movie->language, ['id' => 'language', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('quality', 'Chất lượng') !!}
                    {!! Form::text('quality', $movie->quality, ['id' => 'quality', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('publish_year', 'Năm xuất bản') !!}
                    {!! Form::text('publish_year', $movie->publish_year, [
                        'id' => 'publish_year',
                        'class' => 'form-control',
                        'placeholder' => 'Tên phim',
                    ]) !!}
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="class-tab" role="tabpanel">
            <div class="form-group">
                {!! Form::label('name', 'Định dạng', ['class' => 'required']) !!}
                <div class="form-check">
                    {!! Form::radio('type', 'single', $movie->type == 'single' ? true :false, ['class' => 'form-check-input']) !!}
                    {!! Form::label('type', 'Phân lẻ', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('type', 'series', $movie->type == 'series' ? true :false, ['class' => 'form-check-input']) !!}
                    {!! Form::label('type', 'Phim bộ', ['class' => 'form-check-label']) !!}
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('type')" />
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Tình trạng', ['class' => 'required']) !!}
                <div class="form-check">
                    {!! Form::radio('status', 'trailer', $movie->status == 'trailer' ? true :false, ['class' => 'form-check-input']) !!}
                    {!! Form::label('status', 'Sắp chiếu', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('status', 'ongoing', $movie->status == 'ongoing' ? true :false, ['class' => 'form-check-input']) !!}
                    {!! Form::label('status', 'Đang chiếu', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('status', 'completed', $movie->status == 'completed' ? true :false, ['class' => 'form-check-input']) !!}
                    {!! Form::label('status', 'Hoàn thành', ['class' => 'form-check-label']) !!}
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('status')" />
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Thể loại') !!}
                <div class="row row-cols-3">
                    @foreach ($categories as $category)
                        <div class="col form-check d-flex">
                            {!! Form::checkbox('categories[]', $category->id, in_array($category->id, $movie_categories)) !!}
                            {!! Form::label('categories', $category->name, ['class' => 'form-check-label']) !!}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Khu vực') !!}
                <div class="row row-cols-3">
                    @foreach ($regions as $region)
                        <div class="col form-check d-flex">
                            {!! Form::checkbox('regions[]', $region->id, in_array($region->id, $movie_regions)) !!}
                            {!! Form::label('regions', $region->name, ['class' => 'form-check-label']) !!}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Đạo diễn') !!}
                {!! Form::select('directors[]', $directors, $movie->directors, ['class' => 'form-select', 'id' => 'directors', 'multiple' => 1]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Diễn viên') !!}
                {!! Form::select('actors[]', $actors, $movie->actors, ['class' => 'form-select', 'id' => 'actors', 'multiple' => 1]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Tags') !!}
                {!! Form::select('tags[]', $tags, $movie->tags, ['class' => 'form-select', 'id' => 'tags', 'multiple' => 1]) !!}
            </div>
        </div>
        <div class="tab-pane fade" id="episode-tab" role="tabpanel">
            <div class="mb-3 input-group w-50">
                {{ Form::text('new-server-name','Thuyết minh #1',['id' => 'new-server-name','class' => 'form-control','placeholder'=>'Thuyết minh #1'])}}
                <span class="btn btn-success md:p-1 add-server-btn">Thêm mới</span>
                {{-- <span class="btn btn-success md:p-1 md:d-none add-server-btn"><i class="mdi mdi-plus"></i></span> --}}
            </div>
            <ul class="nav nav-tabs nav-line-tabs" id="episode-server-list">
                    @foreach($server as $key => $item)
                        <li class="nav-item">
                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="tab" href="#episode-server-{{$key}}" aria-selected="true" contenteditable onblur="updateEpisodeServer(this)">{{$item}}</a>
                        </li>
                    @endforeach
            </ul>
            <div class="tab-content" id="episode-server-data">
                @php $count2 = 0 @endphp
                @foreach($episodes_serve as $key => $item)
                <div class="tab-pane {{$count2 == 0 ? 'active' : ''}}" id="episode-server-{{$count2}}" role="tabpanel">
                    <div class="px-0 mb-3 form-inline justify-content-left">
                        <button type="button" class="btn btn-warning add-episode-btn" data-server="0"
                            data-server-name="Vietsub #1">
                            <i class="mdi mdi-plus"></i>
                            Thêm tập mới
                        </button>
                        <button type="button" class="float-right ml-2 btn btn-danger delete-server">
                            <i class="mdi mdi-delete"></i>
                            Xóa server
                        </button>
                    </div>
                    <div class="table-responsive" style="max-height: 400px; overflow:auto;">
                        <table class="table mb-4 table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Slug</th>
                                    <th>Type</th>
                                    <th>Link</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($episodes_serve[$key] as $stt => $item)
                                    <tr class="episode">
                                        {!! Form::hidden('episodes['.$stt.'][id]',$item['id'],['data-attr-name' => 'id']) !!}
                                        {!! Form::hidden('episodes['.$stt.'][server]',$item['server'],['data-attr-name' => 'server']) !!}
                                        <td>
                                            {!! Form::text('episodes['.$stt.'][name]',$item['name'],['class' => 'ep_name form-control', 'data-attr-name' => 'name']) !!}
                                        </td>
                                        <td>
                                            {!! Form::text('episodes['.$stt.'][slug]',$item['slug'],['class' => 'ep_slug form-control', 'data-attr-name' => 'slug']) !!}
                                        </td>
                                        <td>
                                            {!! Form::select('episodes['.$stt.'][type]', config('g-movie.type-video'), null, ['data-attr-name' => 'type', 'class' => 'form-control']) !!}
                                        </td>
                                        <td>
                                            {!! Form::text('episodes['.$stt.'][link]',$item['link'],['class' => 'form-control', 'data-attr-name' => 'link']) !!}
                                        </td>
                                        <td class="text-center">
                                            <button class="cursor-pointer btn btn-outline-danger delete-episode">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @php $count2++ @endphp
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="more-tab" role="tabpanel">
            <div class="col form-check d-flex">
                {!! Form::checkbox('is_shown_in_theater', true, $movie->is_shown_in_theater) !!}
                {!! Form::label('is_shown_in_theater', 'Phim chiếu rạp', ['class' => 'form-check-label']) !!}
            </div>
            <div class="col form-check d-flex">
                {!! Form::checkbox('is_recommended', true, $movie->is_recommended) !!}
                {!! Form::label('is_recommended', 'Đề cử', ['class' => 'form-check-label']) !!}
            </div>
            <div class="col form-check d-flex">
                {!! Form::checkbox('is_copyright', true, $movie->is_copyright) !!}
                {!! Form::label('is_copyright', 'Có bản quyền phim', ['class' => 'form-check-label']) !!}
            </div>
            <div class="col form-check d-flex">
                {!! Form::checkbox('is_sensitive_content', true, $movie->is_sensitive_content) !!}
                {!! Form::label('is_sensitive_content', 'Cảnh báo nội dung người lớn', ['class' => 'form-check-label']) !!}
            </div>
            <div class="col form-check d-flex">
                {!! Form::checkbox('show_slider', true, $movie->show_slider) !!}
                {!! Form::label('show_slider', 'Hiển thị trên slider', ['class' => 'form-check-label']) !!}
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button type="reset" class="btn btn-warning">Reset</button>
    {!! Form::close() !!}
@endsection
@push('js')
<script>
    var route_prefix = "/filemanager";
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
    $('#lfm-poster_url').filemanager('image', {prefix: route_prefix});
    $('#lfm-thumb_url').filemanager('image', {prefix: route_prefix});
    var lfm = function(id, type, options) {
      let button = document.getElementById(id);

      button.addEventListener('click', function () {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        var target_input = document.getElementById(button.getAttribute('data-input'));
        var target_preview = document.getElementById(button.getAttribute('data-preview'));

        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
          var file_path = items.map(function (item) {
            return item.url;
          }).join(',');

          // set the value of the desired input to image url
          target_input.value = file_path;
          target_input.dispatchEvent(new Event('change'));

          // clear previous preview
          target_preview.innerHtml = '';

          // set or change the preview image src
          items.forEach(function (item) {
            let img = document.createElement('img')
            img.setAttribute('style', 'height: 5rem')
            img.setAttribute('src', item.thumb_url)
            target_preview.appendChild(img);
          });

          // trigger change event
          target_preview.dispatchEvent(new Event('change'));
        };
      });
    };
  </script>
@endpush
