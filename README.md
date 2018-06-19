<!-- <p align="center">
    <a href="https://github.com/chunlintang/horizon" target="_blank">
        <img src="http://7xwkvc.com1.z0.glb.clouddn.com/horizon-white.jpeg" alt="horizon" />
    </a>
</p> -->

[![Version](https://img.shields.io/badge/version-1.0.0-green.svg)](https://github.com/chunlintang/Horizon)
[![Php Version](https://img.shields.io/badge/php-%3E=7.0-brightgreen.svg?maxAge=2592000)](https://github.com/chunlintang/Horizon)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](http://opensource.org/licenses/MIT)

> A Modern PHP Framework Base on PHP7 and YAF.Integrated Composer and Swoole.

## Document

- [Document](https://www.gitbook.com/book/mantis/horizon)

## Environmental Requirement

- 1.PHP >= 7.1.5
- 2.Yaf
- 3.Swoole
- 4.Composer

## Install

- Clone
- Composer install

## Configuration

edit the ```config/app.ini```

```ini
[common]
yaf.use_spl_autoload = on
yaf.environ = develop

; application
application.name = horizon
application.timezon = Asia/Shanghai
application.directory = APP_PATH "/application/"
application.bootstrap = APP_PATH "/bootstrap/Bootstrap.php"

; database
database.driver = mysql
database.charset = utf8
database.prefix = ""
database.port = 3306

; cache

; redis

; session

[product : common]
; database
database.host = localhost
database.username = root
database.password = root
database.database = test

[develop : common]
; database
database.host = localhost
database.username = root
database.password = root
database.database = test
```
## Start Server
```
php public/index.php
```