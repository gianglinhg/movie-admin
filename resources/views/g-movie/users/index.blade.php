@extends('layouts.app')
@section('content')
    <table class="table table-hover" id="userTable">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Ngày tạo</th>
                <th>Ngày sửa</th>
                <th></th>
            </tr>
        </thead>
    </table>
@endsection
@push('js')
    <script>

            var table = initDataTable('#userTable', {
                columns: [{
                        "data": "name"
                    },
                    {
                        "data": "email"
                    }, {
                        "data": "created_at",
                        "render": function(data, type, row) {
                            if (type === 'display' || type === 'filter') {
                                return moment(data).format('llll');
                            }
                            return data;
                        }
                    },
                    {
                        "data": "updated_at",
                        "render": function(data, type, row) {
                            if (type === 'display' || type === 'filter') {
                                return moment(data).format("DD-MM-YYYY");
                            }
                            return data; // Sử dụng dữ liệu gốc cho các mục khác
                        }
                    },
                    {
                        title: 'Thao tác',
                        render: function(data, type, row) {
                            return '<a href="' + row.id + '">Sửa</a>';
                        }
                    }
                ],
            })
    </script>
@endpush
