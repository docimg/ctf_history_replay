<?php

// 防御XSS
function html($string) {
	return htmlspecialchars($string);
}

// 防御命令注入
function shellWaf($string) {
	return preg_replace("/(&)|(\|)|(>)|(<)/i", "", $string);
}
