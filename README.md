### ctf_history_replay
CTF比赛题目复现
<br/>

### 使用说明

> image命名规则：docimg/ctf-[比赛开始时间年份]-[比赛英文或拼音首字母]-[题目名称或拼音首字母]

首先要先安装并启动docker服务，这个自行解决

#### 方法一、使用源码自行构建并运行

```bash
git clone https://github.com/docimg/ctf_history_replay.git

# 切换到比赛目录下，启动题目服务
docker-compose up -d [service_name...]

默认web端口：6661+
```

#### 方法二、使用已经构建好的镜像

不用clone源码，只复制docker-compose.yml文件即可
```bash
# 切换到docker-compose.yml目录下
docker-compose pull [service_name...]
docker-compose up -d [service_name...]
```
<br/>

### 相关链接

镜像来源：
- https://github.com/WAY29/geek-2020-challenges
- https://github.com/AFKL-CUIT/Geek2020-AFKL
- https://github.com/gwht/2020YCBCTF
- https://github.com/D0g3-Lab/i-SOON_CTF_2020
- https://github.com/HECTF/2020_Problem_WriteUP
- https://github.com/Nu1LCTF/n1ctf-2020
- https://github.com/SycloverSecurity/SCTF2020
- https://github.com/BjdsecCA/BJDCTF2020_January
- https://github.com/huaweictf/xctf_huaweicloud-qualifier-2020
- https://github.com/sixstars/starctf2021
- https://github.com/D-3CTF/D3CTF-2019-Challenges

题目信息：
- https://github.com/ctfwiki/ctf_game_history