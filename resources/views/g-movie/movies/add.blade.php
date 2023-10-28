@extends('layouts.app')
@section('content')
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="info-tab" data-bs-toggle="pill" data-bs-target="#info" type="button" role="tab"
                aria-selected="true">
                Thông tin phim
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="class-tab" data-bs-toggle="pill" data-bs-target="#class" type="button"
                role="tab" aria-selected="false">
                Phân loại
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="episode-tab" data-bs-toggle="pill" data-bs-target="#episode" type="button"
                role="tab" aria-selected="false">
                Danh sách tập phim
            </button>
        </li>
    </ul>
    {!! Form::open(['route' => 'profile.update', 'method' => 'post']) !!}
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="info" role="tabpanel">
            <div class="row">
                <div class="col-md-6 form-group">
                    {!! Form::label('name', 'Tên phim') !!}
                    {!! Form::text('name', '', ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('origin_name', 'Tên phim gốc') !!}
                    {!! Form::text('origin_name', '', [
                        'id' => 'origin_name',
                        'class' => 'form-control',
                        'placeholder' => 'Tên phim gốc',
                    ]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Đường dẫn tĩnh') !!}
                {!! Form::text('slug', '', ['id' => 'slug', 'class' => 'form-control', 'placeholder' => 'Tên phim']) !!}
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
                {!! Form::label('content', 'Nội dung') !!}
                {!! Form::textarea('content', '', ['id' => 'ckeditor', 'class' => 'form-control', 'placeholder' => 'Nội dung']) !!}
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
            {!! Form::close() !!}
        </div>
        <div class="tab-pane fade show active" id="class" role="tabpanel">
            <div class="form-group">
                {!! Form::label('name', 'Phân loại') !!}
                <div class="form-check">
                    {!! Form::radio('type', 'sigle', '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('type', 'Phân lẻ', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('type', 'series', '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('type', 'Phim bộ', ['class' => 'form-check-label']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Tình trạng') !!}
                <div class="form-check">
                    {!! Form::radio('status', 'sigle', '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('status', 'Sắp chiếu', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('status', 'sigle', '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('status', 'Đang chiếu', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('status', 'sigle', '', ['class' => 'form-check-input']) !!}
                    {!! Form::label('status', 'Hoàn thành', ['class' => 'form-check-label']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Thể loại') !!}
                <div class="row row-cols-3">
                    @foreach ($categories as $category)
                        <div class="col form-check d-flex">
                            {!! Form::checkbox('categories[]', 'categories') !!}
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
                            {!! Form::checkbox('regions[]', 'regions') !!}
                            {!! Form::label('regions', $region->name, ['class' => 'form-check-label']) !!}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
              {!! Form::label('name', 'Đạo diễn') !!}
              {!! Form::select('directors[]', [],'', ['class' => 'form-select', 'id' => 'directors', 'multiple' => 1]) !!}
            </div>
            <div class="form-group">
              {!! Form::label('name', 'Diễn viên') !!}
              {!! Form::select('actors[]', [],'', ['class' => 'form-select', 'id' => 'actors', 'multiple' => 1]) !!}
            </div>
            <div class="form-group">
              {!! Form::label('name', 'Tags') !!}
              {!! Form::select('tags[]', [],'', ['class' => 'form-select', 'id' => 'tags', 'multiple' => 1]) !!}
            </div>
        </div>
        <div class="tab-pane fade" id="episode" role="tabpanel">3</div>
    </div>
    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button class="btn btn-light" onclick="selectFileWithCKFinder('thumb_url')">Cancel</button>
@endsection
@push('css')

@endpush
@push('js')
<script src="{{asset('/utils/ckeditor/build/ckeditor.js')}}"></script>
  <script>
      // function selectFileWithCKFinder(elementId) {
      //     CKFinder.popup({
      //         startupPath: '/images/sherwood-phan-1/',
      //         chooseFiles: true,
      //         width: 800,
      //         height: 600,
      //         onInit: function(finder) {
      //             finder.on('files:choose', function(evt) {
      //                 var file = evt.data.files.first();
      //                 var output = document.getElementById('ckfinder-' + elementId);
      //                 var preview = document.getElementById('preview-' + elementId);
      //                 if (output) {
      //                     output.value = file.getUrl();
      //                 }
      //                 if (preview) {
      //                     preview.src = file.getUrl();
      //                 }
      //             });

      //             finder.on('file:choose:resizedImage', function(evt) {
      //                 var output = document.getElementById(elementId);
      //                 output.value = evt.data.resizedUrl;
      //             });
      //         }
      //     });
      //   }
      ClassicEditor
      .create( document.querySelector( '#ckeditor' ) )
      .catch( error => {
          console.error( error );
      } );
      $(document).ready(function() {
          select2('#directors',{
            tags: true,
          })
          select2('#actors',{
            tags: true,
          })
          select2('#tags',{
            tags: true,
          })
      });
  </script>
@endpush
