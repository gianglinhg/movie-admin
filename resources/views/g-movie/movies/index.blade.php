@extends('layouts.app')
@section('content')
    <table class="table table-hover table-striped" id="movieTable">
        <thead>
            <tr>
                <th>Thông tin</th>
                <th>Ảnh</th>
                <th>Thể loại</th>
                <th>Khu vực</th>
                <th>Người tạo</th>
                <th>Lượt xem</th>
                <th>Hành động</th>
            </tr>

        </thead>
    </table>
@endsection
@push('js')
    <script>
        $(document).ready(function() {

            var table = initDataTable('#movieTable', {
                columns: [{
                        "data": "name",
                        "name": "name",
                        render: function(data, type, row) {
                            return $("<div>").html(data)
                                .text(); // Đảm bảo rằng HTML được hiển thị mà không bị xử lý
                        }
                    },
                    {
                        render: function(data, type, row) {
                            return `<img src="${row.poster_url}" alt="${row.slug}">`
                        }
                    },
                    {
                        "data": "cate_name",
                        name: 'cate_name'

                    },
                    {
                        "data": "region_name",
                        name: "region_name"
                    },
                    {
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        "data": "view_total"
                    },
                    {
                        "data": "",
                        render: function(data, type, row) {
                            return `
                        <a href="movies/${row.id}/edit">
            <button class="btn btn-inverse-primary btn-rounded btn-icon">
                <i class="mdi mdi-grease-pencil"></i>
                </button>
                </a>
            <button class="btn btn-inverse-danger btn-rounded btn-icon _delete-movie" data-id=${row.id}>
                <i class="mdi mdi-delete"></i>
            </button>
            `
                        }
                    },
                ],
            })
        })
        $('#movieTable').on('click', '._delete-movie', function() {
            var confirm = confirm('Thao tác này sẽ xóa tất cả liên quan đến phim này ??');
            if(confirm){
                const id = $(this).data('id');
                $.ajax({
                    url: '/movies/' + id,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        if(data.status){
                            toastr.success(data.msg);
                            $("#movieTable").DataTable().ajax.reload();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                    }
                });
            }
        })
    </script>
@endpush
