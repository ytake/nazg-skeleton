# Nazg Framework Skeleton
Nazg is a PSR-7, PSR-15 compliant Action-Domain-Responder (ADR) Micro framework that helps you quickly write simple yet powerful web applications for HHVM/Hack.

Begin developing HHVM/Hack Http Microframework Skeleton!

[![Packagist](https://img.shields.io/badge/HHVM-%3E=3.25-orange.svg?style=flat-square)](https://packagist.org/packages/nazg/skeleton)
[![Build Status](http://img.shields.io/travis/nazg-hack/framework/master.svg?style=flat-square)](https://travis-ci.org/nazg-hack/framework)
[![Packagist](https://img.shields.io/packagist/dt/nazg/skeleton.svg?style=flat-square)](https://packagist.org/packages/nazg/skeleton)
[![Packagist](https://img.shields.io/packagist/v/nazg/skeleton.svg?style=flat-square)](https://packagist.org/packages/nazg/skeleton)

## About Nazg

 - [Fast Routing For Hack](https://github.com/hhvm/hack-router)
 - [Simple Dependency Injection Container For Hack](https://github.com/ytake/hh-container)
 - [PSR-7/PSR-15 Compliant Middleware Component](https://github.com/ytake/heredity)

## Create Project

```bash
$ hhvm -d xdebug.enable=0 -d hhvm.jit=0 -d hhvm.php7.all=1 -d hhvm.hack.lang.auto_typecheck=0 \
 $(which composer) create-project nazg/skeleton nazg-app-sample --prefer-dist
```

## Docker

```bash
$ docker-compose up
$ docker-compose exec hhvm /bin/bash -c 'cd /var/www/html && composer update'
```

## Vagrant

[Gardening-HHVM Vagrant Box](https://app.vagrantup.com/ytake/boxes/gardening-hhvm)

```bash
$ vagrant box add ytake/gardening-hhvm
```

see https://github.com/ytake/gardening-hhvm#install-gardening-box

## Documentation

[日本語ドキュメント / Japanese](https://github.com/nazg-hack/docs/blob/master/docs/ja/index.md)

## Framework Repository

[Framework](https://github.com/ytake/nazg-framework)

## License
The Nazg Framework is licensed under The MIT License (MIT). See [License File](LICENSE) for more information.
