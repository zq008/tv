<?php
    date_default_timezone_set('PRC');
    error_reporting(0);
    $_��ȡ����Ƶ�� = strstr($_GET['id'], "_") ? trim($_GET['id']) : die(http_response_code(404));
    $_��ý���ַ = "http://hls.yun.gehua.net.cn:8088/live/ipcdn,".$_��ȡ����Ƶ��."K/";
    $_��ý�岥��ʱ�� = intval((time() - 60)/6);
    $_�����б� = "#EXTM3U"."\r\n";
    $_�����б�.= "#EXT-X-VERSION:3"."\r\n";
    $_�����б�.= "#EXT-X-TARGETDURATION:6"."\r\n";
    $_�����б�.= "#EXT-X-MEDIA-SEQUENCE:{$_��ý�岥��ʱ��}"."\r\n";
    for ($_������ʼ��ֵ=0; $_������ʼ��ֵ<3; $_������ʼ��ֵ++)
    {
        $_�����б�.= "#EXTINF:6.00,"."\r\n";
        $_�����б�.= $_��ý���ַ.rtrim(chunk_split($_��ý�岥��ʱ��, 3, "/"), "/").".ts"."\r\n";
        $_��ý�岥��ʱ�� = $_��ý�岥��ʱ�� + 1;
    }
    header("Content-Type: text/plain");
    echo $_�����б�;
?>