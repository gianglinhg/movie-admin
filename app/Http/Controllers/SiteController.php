<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Episode;
use App\Models\Site_model;
use Illuminate\Http\Request;
use simplehtmldom\HtmlDocument;
use DOMDocument;
use DOMXPath;
class SiteController extends Controller
{
    public function __construct(){
        $this->site_model = new Site_model;
    }
    public function home(){
        $data = [];
        $data['latest_movies'] = Movie::orderBy('created_at','asc')->limit(5)->get();
        $data['viewest_movies'] = Movie::orderBy('view_day','desc')->limit(10)->get();
        $data['ongoing_movies'] = Movie::where('status', 'ongoing')->limit(10)->get();
        return view('site.home', $data);
    }
    public function show_single(string $slug){
        $movie = Movie::where('slug', $slug)->first();
        return view('site.show-single', compact('movie'));
    }
    public function watch_movie($movie_slug, $episode, $episode_id){
        $data = [];
        $data['movie'] = Movie::where("slug", $movie_slug)->first();
        $data['episode'] = Episode::where('slug', $episode)->where('id', $episode_id)->first();
        return view('site.watch', $data);
    }
    public function watch(string $slug){
        $movie = Movie::where('slug', $slug)->first();
        return view('site._watch', compact('movie'));
    }

    public function get_menu_quoc_gia()
    {
        // require "/simple-html-dom/simple_html_dom.php";
        $html = '
            <div class="px-1 py-1 grid grid-flow-rows grid-cols-3 justify-items-center" role="none"><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-104" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/trung-quoc">Trung Quốc</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-105" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/han-quoc">Hàn Quốc</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-106" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/nhat-ban">Nhật Bản</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-107" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/thai-lan">Thái Lan</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-108" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/au-my">Âu Mỹ</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-109" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/dai-loan">Đài Loan</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-110" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/hong-kong">Hồng Kông</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-111" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/an-do">Ấn Độ</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-112" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/anh">Anh</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-113" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/phap">Pháp</a></button><button class="bg-violet-500 text-white group flex rounded-md text-sm" id="headlessui-menu-item-114" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/canada">Canada</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-115" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/quoc-gia-khac">Quốc Gia Khác</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-116" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/duc">Đức</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-117" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/tay-ban-nha">Tây Ban Nha</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-118" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/tho-nhi-ky">Thổ Nhĩ Kỳ</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-119" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/ha-lan">Hà Lan</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-120" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/indonesia">Indonesia</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-121" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/nga">Nga</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-122" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/mexico">Mexico</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-123" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/ba-lan">Ba lan</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-124" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/uc">Úc</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-125" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/thuy-dien">Thụy Điển</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-126" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/malaysia">Malaysia</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-127" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/brazil">Brazil</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-128" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/philippines">Philippines</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-129" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/bo-dao-nha">Bồ Đào Nha</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-130" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/y">Ý</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-131" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/dan-mach">Đan Mạch</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-132" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/uae">UAE</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-133" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/na-uy">Na Uy</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-134" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/thuy-si">Thụy Sĩ</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-135" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/chau-phi">Châu Phi</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-136" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/nam-phi">Nam Phi</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-137" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/ukraina">Ukraina</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-138" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/quoc-gia/a-rap-xe-ut">Ả Rập Xê Út</a></button></div>
        '; // Đoạn HTML raw của bạn

        // Tạo đối tượng DOMDocument
        $dom = new DOMDocument;
        libxml_use_internal_errors(true); // Bỏ qua các lỗi HTML không hợp lệ
        $dom->loadHTML('<?xml encoding="UTF-8">' . $html);
        libxml_clear_errors();
        // Tạo đối tượng DOMXPath
        $xpath = new DOMXPath($dom);

        // Tạo mảng để lưu trữ kết quả
        $result = [];

        // Lấy tất cả các thẻ a
        $nodes = $xpath->query('//a');
        // Duyệt qua từng thẻ a và trích xuất href và text
        foreach ($nodes as $node) {
            $href = $node->getAttribute('href');
            $text = $node->nodeValue;
            $result[] = ['href' => $href, 'text' => $text];
        }

        // Tạo câu lệnh SQL để thêm dữ liệu vào bảng
        $sql = "INSERT INTO menus (name, type, link, parent_id, created_at, updated_at) VALUES ";

        $valuesArr = [];
        foreach ($result as $row) {
            $name = addslashes($row['text']);
            $type = 'internal_link';
            $link = addslashes($row['href']);
            $parent_id = 3;
            $now = date('Y-m-d H:i:s');
            $valuesArr[] = "('$name','$type','$link', '$parent_id','$now','$now')";
        }

        $sql .= implode(', ', $valuesArr) . ";";
        echo ($sql);
        die();
    }
    public function get_menu_the_loai()
    {
        // require "/simple-html-dom/simple_html_dom.php";
        $html = '
            <div class="px-1 py-1 grid grid-flow-rows grid-cols-3 justify-items-center" role="none"><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-165" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/hanh-dong">Hành Động</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-166" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/tinh-cam">Tình Cảm</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-167" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/hai-huoc">Hài Hước</a></button><button class="bg-violet-500 text-white group flex rounded-md text-sm" id="headlessui-menu-item-168" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/co-trang">Cổ Trang</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-169" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/tam-ly">Tâm Lý</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-170" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/hinh-su">Hình Sự</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-171" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/chien-tranh">Chiến Tranh</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-172" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/the-thao">Thể Thao</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-173" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/vo-thuat">Võ Thuật</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-174" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/vien-tuong">Viễn Tưởng</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-175" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/phieu-luu">Phiêu Lưu</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-176" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/khoa-hoc">Khoa Học</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-177" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/kinh-di">Kinh Dị</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-178" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/am-nhac">Âm Nhạc</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-179" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/than-thoai">Thần Thoại</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-180" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/tai-lieu">Tài Liệu</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-181" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/gia-dinh">Gia Đình</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-182" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/chinh-kich">Chính kịch</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-183" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/bi-an">Bí ẩn</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-184" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/hoc-duong">Học Đường</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-185" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/kinh-dien">Kinh Điển</a></button><button class="text-gray-900 dark:text-white group flex rounded-md text-sm" id="headlessui-menu-item-186" role="menuitem" tabindex="-1"><a class="px-4 py-2" href="/the-loai/phim-18">Phim 18+</a></button></div>
        '; // Đoạn HTML raw của bạn

        // Tạo đối tượng DOMDocument
        $dom = new DOMDocument;
        libxml_use_internal_errors(true); // Bỏ qua các lỗi HTML không hợp lệ
        $dom->loadHTML('<?xml encoding="UTF-8">' . $html);
        libxml_clear_errors();
        // Tạo đối tượng DOMXPath
        $xpath = new DOMXPath($dom);

        // Tạo mảng để lưu trữ kết quả
        $result = [];

        // Lấy tất cả các thẻ a
        $nodes = $xpath->query('//a');
        // Duyệt qua từng thẻ a và trích xuất href và text
        foreach ($nodes as $node) {
            $href = $node->getAttribute('href');
            $text = $node->nodeValue;
            $result[] = ['href' => $href, 'text' => $text];
        }

        // Tạo câu lệnh SQL để thêm dữ liệu vào bảng
        $sql = "INSERT INTO menus (name, type, link, parent_id, created_at, updated_at) VALUES ";

        $valuesArr = [];
        foreach ($result as $row) {
            $name = addslashes($row['text']);
            $type = 'internal_link';
            $link = addslashes($row['href']);
            $parent_id = 2;
            $now = date('Y-m-d H:i:s');
            $valuesArr[] = "('$name','$type','$link', '$parent_id','$now','$now')";
        }

        $sql .= implode(', ', $valuesArr) . ";";
        echo ($sql);
        die();
    }
}
