<?php
include "curl_func.php";
include "set.php";

function getDocList($header, $repos_list)
{
    $doc_list_data = []; // 所有文档的列表

    // 循环遍历所有仓库
    foreach ($repos_list as $key) {
        $url_doc_list = "https://www.yuque.com/api/v2/repos/$key/docs"; // 获取一个仓库的文档列表
        $ret_doc_list = curl_get($header, $url_doc_list);
        $ret_doc_list = json_decode($ret_doc_list, true);

        // 处理文档数据
        foreach ($ret_doc_list["data"] as $k) {
            $k["namespace"] = $key;
            $doc_list_data[] = $k;
        }
    }

    // 给文档列表按照时间排序，最新的文档在前
    $arr = array_column($doc_list_data, 'content_updated_at');
    array_multisort($arr, SORT_DESC, $doc_list_data);

    return $doc_list_data;
}

if (isset($_GET["namespace"]) && in_array($_GET["namespace"], $repos_list)) {
    $key = $_GET["namespace"];
    $doc_list_data = getDocList($header, [$key]);
} elseif (!isset($_GET["namespace"])) {
    $doc_list_data = getDocList($header, $repos_list);
}
