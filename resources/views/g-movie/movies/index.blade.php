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
    $(document).ready(function (){

    let table = $("#movieTable").DataTable({
      serverSide: true,
      columns:[
        {"data":"name"},
        {
          "data":"thumb_url",
          render: function(data, type, row){
            return `<img src="https://www.themoviedb.org/t/p/original/opevpxkVi07xjvgQR7tctWs2i8o.jpg" alt="${row.name}">`
          }
        },
        {"data":"trailer_url"},
        {"data":"status"},
        { data: 'user_name', name: 'user_name' },
        {"data":"view_total"},
        {
          "data":"",
          render: function(data, type, row){
            return `
            <button class="btn btn-inverse-success btn-rounded btn-icon">
              <a href="#">
                <i class="mdi mdi-eye"></i>
              </a>
            </button>
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
  })
  </script>
@endpush