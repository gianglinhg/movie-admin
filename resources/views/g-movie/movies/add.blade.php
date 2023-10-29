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
    {!! Form::open(['route' => 'movies.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
    <div class="tab-content w-75" id="movie-create">
        <div class="tab-pane fade show active" id="info-tab" role="tabpanel">
            <div class="row">
                <div class="col-md-6 form-group">
                    {!! Form::label('name', 'Tên phim', ['class' => 'required']) !!}
                    {!! Form::text('name', '', ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('origin_name', 'Tên phim gốc', ['class' => 'required']) !!}
                    {!! Form::text('origin_name', '', [
                        'id' => 'origin_name',
                        'class' => 'form-control',
                        'placeholder' => 'Tên phim gốc',
                    ]) !!}
                    <x-input-error class="mt-2" :messages="$errors->get('origin_name')" />
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Đường dẫn tĩnh') !!}
                {!! Form::text('slug', '', ['id' => 'slug', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('poster_url', 'Poster url') !!}
                {!! Form::file('poster_url', ['id' => 'poster_url', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('thumb_url', 'Thumb url') !!}
                {!! Form::file('thumb_url', ['id' => 'thumb_url', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Nội dung') !!}
                {!! Form::textarea('content', '', ['id' => 'ckeditor', 'class' => 'form-control', 'placeholder' => 'Nội dung']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('notify', 'Thông báo / Ghi chú') !!}
                {!! Form::text('notify', '', ['id' => 'notify', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('showtimes', 'Lịch chiếu phim') !!}
                {!! Form::text('showtimes', '', ['id' => 'showtimes', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('trailer_url', 'URL trailer youtube') !!}
                {!! Form::text('trailer_url', '', [
                    'id' => 'trailer_url',
                    'class' => 'form-control',
                    'placeholder' => 'Tên phim',
                ]) !!}
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    {!! Form::label('episode_time', 'Thời lượng tập phim') !!}
                    {!! Form::text('episode_time', '', [
                        'id' => 'episode_time',
                        'class' => 'form-control',
                        'placeholder' => 'Tên phim',
                    ]) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('episode_current', 'Tập phim hiện tại') !!}
                    {!! Form::text('episode_current', '', [
                        'id' => 'episode_current',
                        'class' => 'form-control',
                        'placeholder' => 'Tên phim',
                    ]) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('episode_total', 'Tổng số tập phim') !!}
                    {!! Form::text('episode_total', '', [
                        'id' => 'episode_total',
                        'class' => 'form-control',
                        'placeholder' => 'Tên phim',
                    ]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    {!! Form::label('language', 'Ngôn ngữ') !!}
                    {!! Form::text('language', '', ['id' => 'language', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('quality', 'Chất lượng') !!}
                    {!! Form::text('quality', '', ['id' => 'quality', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('publish_year', 'Năm xuất bản') !!}
                    {!! Form::text('publish_year', '', [
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
                    {!! Form::radio('type', 'single', '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('type', 'Phân lẻ', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('type', 'series', '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('type', 'Phim bộ', ['class' => 'form-check-label']) !!}
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('type')" />
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Tình trạng', ['class' => 'required']) !!}
                <div class="form-check">
                    {!! Form::radio('status', 'trailer', '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('status', 'Sắp chiếu', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('status', 'ongoing', '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('status', 'Đang chiếu', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('status', 'completed', '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('status', 'Hoàn thành', ['class' => 'form-check-label']) !!}
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('status')" />
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Thể loại') !!}
                <div class="row row-cols-3">
                    @foreach ($categories as $category)
                        <div class="col form-check d-flex">
                            {!! Form::checkbox('categories[]', $category->id) !!}
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
                            {!! Form::checkbox('regions[]', $region->id) !!}
                            {!! Form::label('regions', $region->name, ['class' => 'form-check-label']) !!}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Đạo diễn') !!}
                {!! Form::select('directors[]', [], '', ['class' => 'form-select', 'id' => 'directors', 'multiple' => 1]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Diễn viên') !!}
                {!! Form::select('actors[]', [], '', ['class' => 'form-select', 'id' => 'actors', 'multiple' => 1]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Tags') !!}
                {!! Form::select('tags[]', [], '', ['class' => 'form-select', 'id' => 'tags', 'multiple' => 1]) !!}
            </div>
        </div>
        <div class="tab-pane fade" id="episode-tab" role="tabpanel">
            <div class="input-group mb-3 w-50">
                {{ Form::text('new-server-name','',['id' => 'new-server-name','class' => 'form-control','placeholder'=>'Thuyết minh #1'])}}
                <span class="btn btn-success md:p-1 add-server-btn">Thêm mới</span>
                {{-- <span class="btn btn-success md:p-1 md:d-none add-server-btn"><i class="mdi mdi-plus"></i></span> --}}
            </div>
            <ul class="nav nav-tabs nav-line-tabs" id="episode-server-list">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#episode-server-0" aria-selected="true"
                        contenteditable onblur="updateEpisodeServer(this)">Link 1</a>
                </li>
            </ul>
            <div class="tab-content" id="episode-server-data">
                <div class="tab-pane active" id="episode-server-0" role="tabpanel">
                    <div class="form-inline justify-content-left mb-3 px-0">
                        <button type="button" class="btn btn-warning add-episode-btn" data-server="0"
                            data-server-name="Vietsub #1">
                            <i class="mdi mdi-plus"></i>
                            Thêm tập mới
                        </button>
                        <button type="button" class="btn btn-danger ml-2 float-right delete-server">
                            <i class="mdi mdi-delete"></i>
                            Xóa server
                        </button>
                    </div>
                    <div class="table-responsive" style="max-height: 400px; overflow:auto;">
                        <table class="table table-bordered mb-4">
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
                                <tr class="episode">
                                    {!! Form::hidden('episodes[0][server]','Vietsub #1',['class' => 'episode-server', 'data-attr-name' => 'server']) !!}
                                    <td>
                                        {!! Form::text('episodes[0][name]','1',['class' => 'ep_name form-control', 'data-attr-name' => 'name']) !!}
                                    </td>
                                    <td>
                                        {!! Form::text('episodes[0][slug]','tap-1',['class' => 'ep_slug form-control', 'data-attr-name' => 'slug']) !!}
                                    </td>
                                    <td>
                                        {!! Form::select('episodes[0][type]', config('g-movie.type-video'), null, ['data-attr-name' => 'type', 'class' => 'form-control']) !!}
                                    </td>
                                    <td>
                                        {!! Form::text('episodes[0][link]','tap-1',['class' => 'form-control', 'data-attr-name' => 'link']) !!}
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-danger delete-episode cursor-pointer">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="more-tab" role="tabpanel">
            <div class="col form-check d-flex">
                {!! Form::checkbox('is_shown_in_theater', true) !!}
                {!! Form::label('is_shown_in_theater', 'Phim chiếu rạp', ['class' => 'form-check-label']) !!}
            </div>
            <div class="col form-check d-flex">
                {!! Form::checkbox('is_recommended', true) !!}
                {!! Form::label('is_recommended', 'Đề cử', ['class' => 'form-check-label']) !!}
            </div>
            <div class="col form-check d-flex">
                {!! Form::checkbox('is_copyright', true) !!}
                {!! Form::label('is_copyright', 'Có bản quyền phim', ['class' => 'form-check-label']) !!}
            </div>
            <div class="col form-check d-flex">
                {!! Form::checkbox('is_sensitive_content', true) !!}
                {!! Form::label('is_sensitive_content', 'Cảnh báo nội dung người lớn', ['class' => 'form-check-label']) !!}
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
    {!! Form::close() !!}
@endsection
@push('css')
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
    </style>
@endpush
@push('js')
    <script src="{{ asset('/utils/ckeditor/build/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor'))
            .catch(error => {
                console.error(error);
            });
        $(document).ready(function() {
            $('input[name="name"]').on('keyup', function() {
                const slug = changeToSlug($(this).val());
                $('input[name="slug"]').val(slug);
            })
            select2('#directors', {
                tags: true,
            })
            select2('#actors', {
                tags: true,
            })
            select2('#tags', {
                tags: true,
            })
        });

        function updateNameAttr() {
            $('.episode').each((index, episode) => {
                $(episode).find('[data-attr-name]').each((i, attr) => {
                    const attrName = $(attr).attr('data-attr-name').split('.').reduce((a, b) =>
                        `${a}[${b}]`, '')
                    $(attr).attr('name', `episodes[${index}]${attrName}`)
                })
            })
        }

        const templateEpisode = (i, server, item = null, fake_name = 0) => {
            var [name, link, type, slug, id] = ['', '', '', '', ''];
            if (item) {
                let countItem = item.split('|').length;
                if (countItem === 1) {
                    link = item;
                } else {
                    [name, link, type, slug, id] = item.split('|');
                }

                if (!name) {
                    name = fake_name;
                }
                if (!type) {
                    if (link.indexOf('.m3u8') !== -1) type = 'm3u8'
                    if (link.indexOf('.mp4') !== -1) type = 'mp4'
                }
                if (!slug) slug = `tap-${change_alias(name.toString())}`;
            }
            return `<tr class="episode">
                <input type="hidden" name="episodes[${i}][id]" value="${i}" data-attr-name="id">
                <input type="hidden" class="episode-server" value="${server}" data-attr-name="server">
                <td><input type="text" placeholder="${name || '1'}" value="${name || '1'}" class="ep_name form-control"
                    data-attr-name="name">
                </td>
                <td><input type="text" placeholder="${slug || 'tap-1'}" value="${slug || 'tap-1'}" class="form-control"
                    data-attr-name="slug"></td>
                <td>
                    <select data-attr-name="type" class="form-control">
                    <option value="embed" ${'embed'==type ? 'selected' : '' }>Nhúng</option>
                    <option value="mp4" ${'mp4'==type ? 'selected' : '' }>MP4</option>
                    <option value="m3u8" ${'m3u8'==type ? 'selected' : '' }>M3U8</option>
                    </select>
                </td>
                <td><input type="text" placeholder="" value="${link || ''}" class="form-control" data-attr-name="link"></td>
                <td class="text-center">
                    <button class="btn btn-outline-danger delete-episode cursor-pointer">Xóa</button>
                </td>
            </tr>`
        }
        $(".add-server-btn").click(function(e) {
            const serverCount = $('#episode-server-list').children('.nav-item').length;
            const serverName = $('#new-server-name').val();
            const templateList = (i, name) => {
                return `<li class="nav-item"><a class="nav-link episode-server" data-bs-toggle="tab" href="#episode-server-${i}"
                                role="tab" aria-controls="episode-server-${i}" aria-selected="true" contenteditable>${name}</a>
                        </li>`;
            }
            const templateData = (i, name) => {
                return `
                <div class="tab-pane" id="episode-server-${i}" role="tabpanel">
                    <div class="form-inline justify-content-left mb-3 px-0">
                                <button type="button" class="btn btn-warning mr-2 add-episode-btn" data-server="${i}" data-server-name="${name}">
                                    <i class="las la-plus"></i>
                                    Thêm tập mới
                                </button>
                                <button type="button" class="btn btn-danger float-right delete-server">
                                    <i class="las la-trash"></i>
                                    Xóa server
                                </button>
                            </div>
                            <div class="table-responsive mb-3" style="max-height: 400px; overflow:auto;">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Type</th>
                                            <th>Link</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>`;
            }
            $('#episode-server-list').append(templateList(serverCount, serverName));
            $('#episode-server-data').append(templateData(serverCount, serverName));

            $('.episode-server[data-bs-toggle="tab"]').last().click();
        })

        $(document).on('click', '.add-episode-btn', function(e) {
            $(`#episode-server-${$(this).data('server')} table tbody`).append(templateEpisode($('.episode')
                .length, $(this).data('server-name')));
            updateNameAttr();
        })
        $(document).on('click', '.delete-episode', function(e) {
            $(this).closest('tr').remove();
            updateNameAttr();
        })
        $(document).on('click', '.delete-server', function(e) {
            const tab = $(this).closest('.tab-pane');
            const tabLink = $(`.nav-link[href="#${$(tab).attr('id')}"]`);
            $(tab).remove();
            $(tabLink).closest('.nav-item').remove();
            updateNameAttr();
            $('.episode-server[data-toggle="tab"]').last().click();
        });
    </script>
@endpush
