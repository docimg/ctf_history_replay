<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>教案</title>
</head>
<body>

<?php
include("waf.php");

// 设置目录名称并进行扫描。
$search_dir = $_GET['dirname'];
$title = "教案";

// 防止命令注入
$search_dir = shellWaf($search_dir);

//$contents = scandir($search_dir); 或者使用
exec("ls $search_dir", $contents);

print "<h1>$title</h1><hr/><br/>";

// 列出文件。
foreach ($contents as $item) {
	if ( is_file($search_dir . '/' . $item) AND substr($item, 0, 1) != '.' ) {

	// 打印信息。
	print "<a href=\"displaySourceCode.php?phpfile=$search_dir/$item\">$item</a><br/>";
	}
}
?>

</body>
</html>
