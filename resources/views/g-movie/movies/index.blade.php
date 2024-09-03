@extends('layouts.app')
@section('content')
    <div class="mb-2 row">
        <div class="col-md-2">
            <select name="data_non" class="form-select" aria-label="Default select example">
                <option selected>Thiếu data</option>
                <option value="thumb">Thumb url</option>
                <option value="poster">Poster url</option>
                <option value="trailer">Trailer url</option>
              </select>
        </div>
    </div>
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
            <a href=""></a>
        </thead>
    </table>
    <nav aria-label="Page navigation example" id="pagination">
        <ul class="pagination">
            {{-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
        </ul>
    </nav>
    {{-- {{ $movie->links() }} --}}
@endsection
@push('js')
    <script>
        $(document).ready(function() {

            var table = initDataTable('#movieTable', {
                "ajax": {
                    "url": "/admin/movies",
                    // "type": "GET",
                    "data": function (d) {
                        d.page = (d.start / d.length) + 1; // Tính toán trang hiện tại
                        d.type = $('select[name="type"]').val();
                    }
                },
                columns: [{
                        "data": "name",
                        "name": "name",
                        render: function(data, type, row) {
                            return $("<div>").html(data).text(); // Đảm bảo rằng HTML được hiển thị mà không bị xử lý
                        }
                    },
                    {
                        render: function(data, type, row) {
                            return `<a href="${row.thumb_url}" target="_blank"><img src="${row.thumb_url}" alt="${row.slug}"></a>`
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
                        <button class="btn btn-inverse-danger btn-rounded btn-icon _delete-movie" data-id="${row.id}">
                            <i class="mdi mdi-delete"></i>
                        </button>
                        `
                        }
                    },
                ],
                columnDefs:
      [ {
          "targets": [1],
          "orderable": false,
          "searchable": false,
          "visible": false,
      } ],
            })
        })
        $('select[name="data_non"]').on('change',function(){
            $.ajax({
        url: '/admin/movies', // Thay thế bằng đường dẫn đến controller của bạn
        type: 'GET',
        data: {type: $(this).val()},
        success: function(data) {
            // Xóa dữ liệu cũ của DataTable
            $('#movieTable').DataTable().clear().destroy();

            // Cập nhật dữ liệu mới từ kết quả của yêu cầu AJAX
            $('#movieTable').DataTable({
                data: data, // Dữ liệu mới từ controller
                // Cấu hình DataTable theo ý muốn
            });
        },
        error: function(error) {
            console.log('Error:', error);
        }
    });
        })
        $('#movieTable').on('click', '._delete-movie', function() {
            if (confirm('Thao tác này sẽ xóa tất cả liên quan đến phim này ??')) {
                const id = $(this).data('id');
                $.ajax({
                    url: '/admin/movies/' + id,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.message);
                            $("#movieTable").DataTable().ajax.reload();
                        }else{
                            toastr.error(res.message);
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
