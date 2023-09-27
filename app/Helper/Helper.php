<?php

if (!function_exists('formatDate')) {
  function formatDate($date, string $format = 'Y/m/d')
  {
      if ($date instanceof \Carbon\Carbon) {
          return $date->format($format);
      }

      return $date;
  }
}
if (!function_exists('createOrUpdate')) {
  function createOrUpdate(string $table,array $data, string $time)
  {
    if(empty($data['id'])){
      $data['created_at'] = $time;
      $data['updated_at'] = $time;
      \DB::table($table)->insert($data);
      return 'Đã tạo mới thành công';
    }else{
      $data['updated_at'] = $time;
      \DB::table($table)->where('id',$data['id'])->update($data);
      return 'Đã cập nhật thành công';
    }
  }
}