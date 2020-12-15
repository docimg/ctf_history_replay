<?php
$flag = "SYC{flag不在这里，在主目录里哦~}";
echo "请先缴纳1145141919810元学费进行查看！";

if (/*$_SESSION["pay"] >= 1145141919810*/ false) {
	echo $flag;
}