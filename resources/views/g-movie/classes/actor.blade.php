@extends('layouts.app')
@section('content')
    <table class="table table-hover table-striped" id="actorTable">
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
    <!-- Modal thêm mới actor -->
    <div class="modal fade" id="new_actor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-modal">Thêm mới diễn viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {!! Form::open(['method' => 'post', 'id' => 'new-actor']) !!}
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group row">
                        {!! Form::label('name', 'Tên actor', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', '', ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Tên actor']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('slug', 'Đường dẫn tĩnh', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('slug', '', ['id' => 'slug', 'class' => 'form-control', 'placeholder' => 'duong-dan-tinh']) !!}
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="d-flex justify-content-end align-items-center gap-2">
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
            var actorTable = initDataTable('#actorTable', {
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
            $('.new_actor').on('click', function() {
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
                $.post(`${url}/actors/store`, data, (res, status) => {
                    if (res.status) {
                        toastr.success(res.res);
                        $('#new_actor').modal('hide');
                        $("#actorTable").DataTable().ajax.reload();
                    }
                });
            });
            $('#actorTable').on('click', '.btn-remove', function() {
                cuteAlert({
                    type: "question",
                    title: "Bạn có chắc xóa actor phim này không ?",
                    message: "Hành động này không thể hoàn tác !!!",
                    confirmText: "Chắc chắn",
                    cancelText: "Trở về"
                }).then((e) => {
                    if (e == 'confirm') {
                        const id = $(this).data('id');
                        $.post(`${url}/actors/destroy/${id}`, (res, status) => {
                            toastr.success(res.message);
                            $("#actorTable").DataTable().ajax.reload();
                        });
                    }
                })
            })
            $('#actorTable').on('click', '.btn-edit', function() {
                const id = $(this).data('id');
                $.get(`${url}/actors/${id}/edit`, (res, status) => {
                    const new_actor = $('#new_actor');
                    new_actor.find('input[name="id"]').val(res.id);
                    new_actor.find('input[name="name"]').val(res.name);
                    new_actor.find('input[name="slug"]').val(res.slug);
                    new_actor.find('#title-modal').text('Sửa diễn viên');
                    new_actor.modal('show');
                });
            })
        })
    </script>
@endpush
