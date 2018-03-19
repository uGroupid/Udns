<?php 
header('Content-Type: text/html; charset=utf-8');
require_once(__DIR__ ."/extends/helper.php");
echo __DIR__ ."/extends/helper.php";
$crawler = new Helper;
$url = "http://baoninhbinh.org.vn/nhon-nhip-khong-khi-sam-hoa-choi-tet-20180104031946780p3c24.htm";
$namespace = 1;
$element = "ndt";
$bai_1 = $crawler->crawler_run($url,$namespace,$element);
echo "</br>------Nội dung---baoninhbinh.org.vn</br>";
echo "URL:".$url."</br>";
echo $bai_1."</br>";
echo "</br>----------------------------------------------------------------------------</br>";
echo "</br>-------------Nội dung---http://nbtv.vn<br>";
$url2 = "http://nbtv.vn/xa-hoi/ninh-binh/201801/ho-tro-tren-62-ty-dong-cho-nan-nhan-chat-doc-da-cam-774959/";
echo "URL:".$url2."</br>";

$namespace2 = 2;
$element2 = "article";
$bai_2 = $crawler->crawler_run($url2,$namespace2,$element2);
echo $bai_2."</br>";
?>