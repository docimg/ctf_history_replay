<!DOCTYPE html>
<html>
<head>
<title>源码展示</title>
</head>

<body>

<?php
include("waf.php");

// 使用fopen打开一个文件；如果不能打开，则给出信息。
$filename = $_GET['phpfile'];

// 注意下面，会导致XSS
// $myfile = fopen($filename, "r") or die ("Cannot open $filename");

$myfile = fopen($filename, "r") or die(html("Cannot open $filename"));

print ("<xmp style='font-size: +2ex'>");
do {
 $line = fgets($myfile, 1024);
 print ("$line");
} while(!feof($myfile));
print ("</xmp>");

// 关闭文件
fclose($myfile);
?>

</body>
</html>