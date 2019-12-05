<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations  共享配置
    mail/                contains view files for e-mails 邮件
    models/              contains model classes used in both backend and frontend 共同Model
    tests/               contains tests for common classes    测试类文件
console
    config/              contains console configurations 控制台配置
    controllers/         contains console controllers (commands) 控制台控制器
    migrations/          contains database migrations 数据库迁移文件
    models/              contains console-specific model classes 控制台专用model
    runtime/             contains files generated during runtime 控制台运行时生成的缓存文件
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets  后台的小组件
vendor/                  contains dependent 3rd-party packages 依赖第三方扩展
environments/            contains environment-based overrides  基于环境的覆盖文件
```
