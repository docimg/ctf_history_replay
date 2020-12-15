<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['correct']) || $_SESSION['correct'] !== true){
	header('HTTP/1.1 403 Forbidden');
	die();
}
date_default_timezone_set('PRC'); 
function refresh($status,$mes){
		header("Content-Type: text/json");
		die(json_encode(
			array(
                'status' => $status ? 'success' : 'failed',
                'content' => $mes
            )
        ));
}
if(isset($_FILES['file'])) {
    if($_COOKIE['Username']!="eDFoeTk=")
    {
		refresh(0,"你不是当值狱警,你想干什么?!");
    }
    $name = basename($_POST['name']);
    $ext = pathinfo($name,PATHINFO_EXTENSION);
    if(in_array($ext, ['php', 'php3', 'php4', 'php5', 'phtml', 'htaccess', 'ini'])) 
    {
		refresh(0,"上传奇奇怪怪的东西是不行的噢!");
	}
	if (isset($_SESSION['current_time']) && time() - $_SESSION['current_time'] < 300) {
		refresh(0,"5分钟内只能上传一个文件");
	}
    if(move_uploaded_file($_FILES['file']['tmp_name'], '../upload/' . $name))
    {
		$_SESSION['current_time'] = time();
		refresh(1,"文件存储在: "."../upload/" . trim($name));
	} else {
		refresh(0,"文件上传失败");
	}
}?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>mimei照片上传页</title>

<link href="static/css/login.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="static/lib/jquery/1.9.1/jquery.min.js"></script> 
<script src="static/js/verificationNumbers.js" tppabs="static/js/verificationNumbers.js"></script>
<style>
.J_codeimg{z-index:-1;position:absolute;}
</style>
</head>
<body>
<div class="login-box" id="demo">
   <div class="input-content">
     <div class="login_tit">
          <div>
            <i class="tit-bg left"></i>
              双流监狱 · JK照片盈利系统
            <i class="tit-bg right"></i>
          </div>
          <p>上传&nbsp;&nbsp;JK&nbsp;&nbsp;照片</p>
     </div>    
     <p class="p val_icon" >
       <input type="text" id="name" style="text-align:center;font-size:larger" placeholder="文件名" autocomplete="off" class="login_txtbx">
     </p> 
     <p class="p pwd_icon" >
       <input type="file" id="file" style="text-align:center" placeholder="" autocomplete="off" class="login_txtbx">
     </p>     	    
      <div class="signup">
      	  <a class="gv" href="#" onclick="validate()">上&nbsp;&nbsp;传</a>
     </div>
  </div>
  <div class="canvaszz"> </div>
  <canvas id="canvas"></canvas> 
</div>
<script>
//宇宙特效
"use strict";
var canvas = document.getElementById('canvas'),
  ctx = canvas.getContext('2d'),
  w = canvas.width = window.innerWidth,
  h = canvas.height = window.innerHeight*1.5,

  hue = 217,
  stars = [],
  count = 0,
  maxStars = 2500;//星星数量

var canvas2 = document.createElement('canvas'),
  ctx2 = canvas2.getContext('2d');
canvas2.width = 100;
canvas2.height = 100;
var half = canvas2.width / 2,
  gradient2 = ctx2.createRadialGradient(half, half, 0, half, half, half);
gradient2.addColorStop(0.025, '#CCC');
gradient2.addColorStop(0.1, 'hsl(' + hue + ', 61%, 33%)');
gradient2.addColorStop(0.25, 'hsl(' + hue + ', 64%, 6%)');
gradient2.addColorStop(1, 'transparent');

ctx2.fillStyle = gradient2;
ctx2.beginPath();
ctx2.arc(half, half, half, 0, Math.PI * 2);
ctx2.fill();

// End cache

function random(min, max) {
  if (arguments.length < 2) {
    max = min;
    min = 0;
  }

  if (min > max) {
    var hold = max;
    max = min;
    min = hold;
  }

  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function maxOrbit(x, y) {
  var max = Math.max(x, y),
    diameter = Math.round(Math.sqrt(max * max + max * max));
  return diameter / 2;
  //星星移动范围，值越大范围越小，
}

var Star = function() {

  this.orbitRadius = random(maxOrbit(w, h));
  this.radius = random(60, this.orbitRadius) / 18; 
  //星星大小
  this.orbitX = w / 2;
  this.orbitY = h / 2;
  this.timePassed = random(0, maxStars);
  this.speed = random(this.orbitRadius) / 500000; 
  //星星移动速度
  this.alpha = random(2, 10) / 10;

  count++;
  stars[count] = this;
}

Star.prototype.draw = function() {
  var x = Math.sin(this.timePassed) * this.orbitRadius + this.orbitX,
    y = Math.cos(this.timePassed) * this.orbitRadius + this.orbitY,
    twinkle = random(10);

  if (twinkle === 1 && this.alpha > 0) {
    this.alpha -= 0.05;
  } else if (twinkle === 2 && this.alpha < 1) {
    this.alpha += 0.05;
  }

  ctx.globalAlpha = this.alpha;
  ctx.drawImage(canvas2, x - this.radius / 2, y - this.radius / 2, this.radius, this.radius);
  this.timePassed += this.speed;
}

for (var i = 0; i < maxStars; i++) {
  new Star();
}

function animation() {
  ctx.globalCompositeOperation = 'source-over';
  ctx.globalAlpha = 0.5; //尾巴
  ctx.fillStyle = 'hsla(' + hue + ', 64%, 6%, 2)';
  ctx.fillRect(0, 0, w, h)

  ctx.globalCompositeOperation = 'lighter';
  for (var i = 1, l = stars.length; i < l; i++) {
    stars[i].draw();
  };

  window.requestAnimationFrame(animation);
}

animation();
</script>

</body>
</html>