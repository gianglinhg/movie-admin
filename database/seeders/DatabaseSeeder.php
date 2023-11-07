<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DOMDocument;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $countries = array(
            "Nigeria",
            "Anh",
            "Thụy Sĩ",
            "Ukraina",
            "Châu Phi",
            "Ireland",
            "UAE",
            "Ả Rập Xê Út",
            "Malaysia",
            "Colombia",
            "Tây Ban Nha",
            "Việt Nam",
            "Hàn Quốc",
            "Trung Quốc",
            "Âu Mỹ",
            "Ấn Độ",
            "Brazil",
            "Hồng Kông",
            "Nhật Bản",
            "Thái Lan",
            "Bồ Đào Nha",
            "Chile",
            "Ý",
            "Đức",
            "Ba lan",
            "Hà Lan",
            "Philippines",
            "Đan Mạch",
            "Thụy Điển",
            "Quốc Gia Khác",
            "Mexico",
            "Bỉ",
            "Nam Phi",
            "Hy Lạp",
            "Thổ Nhĩ Kỳ",
            "Đài Loan",
            "Úc",
            "Canada",
            "Na Uy",
            "Indonesia",
            "Nga",
            "Phần Lan",
            "Pháp"
          );

          // Truy cập tên của quốc gia đầu tiên:


        $test = \DB::table('regions')->pluck('slug')->toArray();



        foreach($countries as $item){
            if(!in_array(\Str::slug($item), $test)){
            \DB::table('regions')->insert([
                'name' => $item,
                'slug' => \Str::slug($item),
                'user_id' => \Auth::id(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        }
    }
}
