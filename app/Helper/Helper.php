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
  function createOrUpdate(string $table, array $data, string $time)
  {
    if (empty($data['id'])) {
      $data['created_at'] = $time;
      $data['updated_at'] = $time;
      \DB::table($table)->insert($data);
      return 'Đã tạo mới thành công';
    } else {
      $data['updated_at'] = $time;
      \DB::table($table)->where('id', $data['id'])->update($data);
      return 'Đã cập nhật thành công';
    }
  }
}
if (!function_exists('addSub')) {
  function addSub(string $table, array $data, string $movie_id, string $col)
  {
    if (isset($data) && !empty($data)) {
      foreach ($data as $item) {
        DB::table($table)->insert([
          'movie_id' => $movie_id,
          $col => $item,
        ]);
      }
    }
  }
}
if (!function_exists('deleteSub')) {
  function deleteSub(string $table, string $movie_id)
  {
    DB::table($table)->where('movie_id', $movie_id)->delete();
  }
}
if (!function_exists('checkSub')) {
  function checkSub(string $table, string $movie_id)
  {
    $subs = DB::table($table)->where('movie_id', $movie_id)->get();
    if ($subs) {
      return true;
    }
    return false;
  }
}
if (!function_exists('asset_save')) {
  function asset_save(string $image_url = "")
  {
    if(!empty($image_url)) {
      if (strpos($image_url, url('')) === 0) {
          return substr($image_url, strlen(url('')));
      } else {
          return $image_url;
      }
    }
    return "";
  }
}
if (!function_exists('get_select_array')) {
  function get_select_array($data)
  {
    $out = [];
    foreach ($data as $value) {
      $out[$value->id] = $value->name;
    }
    return $out;
  }
}
if (!function_exists('get_lasted_movies')) {
  function get_lasted_movies(){
    return \App\Models\Movie::orderBy('created_at','desc')->limit(5)->get();
  }
}