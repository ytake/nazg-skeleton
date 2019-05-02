# Nazg Framework Skeleton
Nazg is a PSR-7, PSR-15 compliant Action-Domain-Responder (ADR) Micro framework that helps you quickly write simple yet powerful web applications for HHVM/Hack.

Begin developing HHVM/Hack Http Microframework Skeleton!

[![Build Status](http://img.shields.io/travis/nazg-hack/framework/master.svg?style=flat-square)](https://travis-ci.org/nazg-hack/framework)
[![Packagist](https://img.shields.io/packagist/dt/nazg/skeleton.svg?style=flat-square)](https://packagist.org/packages/nazg/skeleton)
[![Packagist](https://img.shields.io/packagist/v/nazg/skeleton.svg?style=flat-square)](https://packagist.org/packages/nazg/skeleton)

## About Nazg

 - [Fast Routing For Hack](https://github.com/hhvm/hack-router)
 - [Dependency Injection Container For HHVM/Hack](https://github.com/nazg-hack/glue)
 - [Request/Response Middleware Component](https://github.com/nazg-hack/heredity)

## Create Project

```bash
$ composer create-project nazg/skeleton nazg-app-sample --prefer-dist
```

## Docker

```bash
$ docker-compose up
$ docker-compose exec hhvm /bin/bash -c 'cd /var/www/html && composer update'
```

## Framework Repository

[Framework](https://github.com/ytake/nazg-framework)

## License
The Nazg Framework is licensed under The MIT License (MIT). See [License File](LICENSE) for more information.
