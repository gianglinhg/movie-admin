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
        var table = initDataTable('#movieTable', {
            columns: [{
                    "data": "name",
                    "name": "name",
                    render: function (data, type, row) {
                    return $("<div>").html(data).text(); // Đảm bảo rằng HTML được hiển thị mà không bị xử lý
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
            <button class="btn btn-inverse-primary btn-rounded btn-icon">
              <a href="#">
                <i class="mdi mdi-grease-pencil"></i>
              </a>
            </button>
            <button class="btn btn-inverse-danger btn-rounded btn-icon">
              <a href="#">
                <i class="mdi mdi-delete"></i>
              </a>
            </button>
            `
                    }
                },
            ],
        })
    </script>
@endpush
