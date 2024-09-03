@extends('layouts.app')
@section('content')
    <table class="table table-hover table-striped" id="regionTable">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Đường dẫn tĩnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
    </table>
@endsection
@section('modal')
    <!-- Modal thêm mới region -->
    <div class="modal fade" id="new_region" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-modal">Thêm mới region</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {!! Form::open(['method' => 'post', 'id' => 'new-region']) !!}
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group row">
                        {!! Form::label('name', 'Tên region', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', '', ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Tên region']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('slug', 'Đường dẫn tĩnh', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('slug', '', ['id' => 'slug', 'class' => 'form-control', 'placeholder' => 'duong-dan-tinh']) !!}
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="gap-2 d-flex justify-content-end align-items-center">
                            {!! Form::checkbox('seo_key', 'SEO') !!}
                            <span>SEO</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('slug', 'Đường dẫn tĩnh', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('slug', '', ['id' => 'slug', 'class' => 'form-control', 'placeholder' => 'duong-dan-tinh']) !!}
                        </div>
                    </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-submit">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var regionTable = initDataTable('#regionTable', {
                columns: [{
                        "data": "name"
                    },
                    {
                        "data": "slug"
                    },
                    {
                        render: function(data, type, row) {
                            return `
                                <button class="btn btn-inverse-primary btn-rounded btn-icon btn-edit" data-id="${row.id}">
                                    <i class="mdi mdi-grease-pencil"></i>
                                </button>
                                <button class="btn btn-inverse-danger btn-rounded btn-icon btn-remove" data-id="${row.id}">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            `
                        }
                    },
                ],
            });
        })
        $(function() {
            $('.new_region').on('click', function() {
                $('input[name="id"]').val('');
                $('input[name="name"]').val('');
                $('input[name="slug"]').val('');
            });
            $('input[name="name"]').on('keyup', function() {
                const slug = changeToSlug($(this).val());
                $('input[name="slug"]').val(slug);
            })
            $('.btn-submit').on('click', '', function(e) {
                e.preventDefault();
                var data = {};
                data.id = $('input[name="id"]').val();
                data.name = $('input[name="name"]').val();
                data.slug = $('input[name="slug"]').val();
                $.post(`${admin_url}/regions/store`, data, (res, status) => {
                    if (res.status) {
                        toastr.success(res.res);
                        $('#new_region').modal('hide');
                        $("#regionTable").DataTable().ajax.reload();
                    }
                });
            });
            $('#regionTable').on('click', '.btn-remove', function() {
                cuteAlert({
                    type: "question",
                    title: "Bạn có chắc xóa region phim này không ?",
                    message: "Hành động này không thể hoàn tác !!!",
                    confirmText: "Chắc chắn",
                    cancelText: "Trở về"
                }).then((e) => {
                    if (e == 'confirm') {
                        const id = $(this).data('id');
                        $.post(`${admin_url}/regions/destroy/${id}`, (res, status) => {
                            if(res.status){
                                toastr.success(res.message);
                                $("#regionTable").DataTable().ajax.reload();
                            }else{
                                toastr.error(res.message);
                            }
                        });
                    }
                })
            })
            $('#regionTable').on('click', '.btn-edit', function() {
                const id = $(this).data('id');
                $.get(`${admin_url}/regions/${id}/edit`, (res, status) => {
                    const new_region = $('#new_region');
                    new_region.find('input[name="id"]').val(res.id);
                    new_region.find('input[name="name"]').val(res.name);
                    new_region.find('input[name="slug"]').val(res.slug);
                    new_region.find('#title-modal').text('Sửa region');
                    new_region.modal('show');
                });
            })
        })
    </script>
@endpush
