<title>yuque</title>
<meta name="referrer" content="no-referrer">
<link rel="shortcut icon" href="/icons/Kk.png">
<link rel="stylesheet" type="text/css" href="http://editor.yuque.com/ne-editor/lake-content-v1.css">
<link href="https://cdn.bootcdn.net/ajax/libs/highlight.js/10.7.2/styles/atom-one-dark.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/doc_view.css">
<script src="https://cdn.bootcdn.net/ajax/libs/highlight.js/10.7.2/highlight.min.js"></script>
<script defer src="/_vercel/insights/script.js"></script>


<script>
  window.onload = function() {
    var aCodes = document.getElementsByTagName('pre');
    for (var i = 0; i < aCodes.length; i++) {
      hljs.highlightBlock(aCodes[i]); //代码高亮
    }
  };
</script>
<?php
include "set.php";
include "curl_func.php";
if (in_array($_GET["namespace"], $repos_list)) {
  $url_doc_detail = "https://www.yuque.com/api/v2/repos/{$_GET["namespace"]}/docs/{$_GET["id"]}"; //获取单篇文档的详细信息

  $ret2 = curl_get($header, $url_doc_detail);
  $json_arr2 = json_decode($ret2, true);
  echo "<br><h1>{$json_arr2["data"]["title"]}</h1><p>" . date("Y-m-d H:i", strtotime($json_arr2["data"]["updated_at"])) . "</p><br><hr>{$json_arr2["data"]["body_html"]}";
}

?>

<script src="js/doc_view.js"></script>