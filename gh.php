<?php
    date_default_timezone_set('PRC');
    error_reporting(0);
    $_获取播放频道 = strstr($_GET['id'], "_") ? trim($_GET['id']) : die(http_response_code(404));
    $_流媒体地址 = "http://hls.yun.gehua.net.cn:8088/live/ipcdn,".$_获取播放频道."K/";
    $_流媒体播放时间 = intval((time() - 60)/6);
    $_播放列表 = "#EXTM3U"."\r\n";
    $_播放列表.= "#EXT-X-VERSION:3"."\r\n";
    $_播放列表.= "#EXT-X-TARGETDURATION:6"."\r\n";
    $_播放列表.= "#EXT-X-MEDIA-SEQUENCE:{$_流媒体播放时间}"."\r\n";
    for ($_遍历开始数值=0; $_遍历开始数值<3; $_遍历开始数值++)
    {
        $_播放列表.= "#EXTINF:6.00,"."\r\n";
        $_播放列表.= $_流媒体地址.rtrim(chunk_split($_流媒体播放时间, 3, "/"), "/").".ts"."\r\n";
        $_流媒体播放时间 = $_流媒体播放时间 + 1;
    }
    header("Content-Type: text/plain");
    echo $_播放列表;
?>