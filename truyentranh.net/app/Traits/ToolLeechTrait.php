<?php

namespace App\Traits;

trait ToolLeechTrait
{
    public function getDom($link = null)
    {
        $userAgent = 'Googlebot/2.1 (http://www.google.bot.com/bot.html)';
        // Initialize curl and following options
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_URL, $link ?? $this->url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        // Grab the html from the page
        $content = curl_exec($ch);
        // Error handling
        if (!$content) {
            //handle error if page was not reachable, etc
            exit();
        }
        // Create DOM from URL or file
        $dom = str_get_html($content);
        return $dom;
    }

    public function curl_download_image($Url, $saveTo)
    {
        // Mở một file mới với đường dẫn và tên file là tham số $saveTo
        $fp = fopen($saveTo, 'w+');
        // Bắt đầu CURl
        $ch = curl_init($Url);
        // Thiết lập giả lập trình duyệt
        // nghĩa là giả mạo đang gửi từ trình duyệt nào đó, ở đây tôi dùng Firefox
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");
        // Thiết lập trả kết quả về chứ không print ra
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Thời gian timeout
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
        // Lưu kết quả vào file vừa mở
        curl_setopt($ch, CURLOPT_FILE, $fp);
        // Thực hiện download file
        $result = curl_exec($ch);
        // Đóng CURL
        curl_close($ch);

        return $result;
    }
}