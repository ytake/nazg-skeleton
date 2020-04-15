# Nazg Framework Skeleton

Nazg is a Action-Domain-Responder (ADR) Micro framework that helps you quickly write simple yet powerful web applications for HHVM/Hack.

Begin developing HHVM/Hack Http Microframework Skeleton!

[![Build Status](http://img.shields.io/travis/nazg-hack/framework/master.svg?style=flat-square)](https://travis-ci.org/nazg-hack/framework)
[![Packagist](https://img.shields.io/packagist/dt/nazg/skeleton.svg?style=flat-square)](https://packagist.org/packages/nazg/skeleton)
[![Packagist](https://img.shields.io/packagist/v/nazg/skeleton.svg?style=flat-square)](https://packagist.org/packages/nazg/skeleton)

## Supported

HHVM 4.41 and above.

## About Nazg

 - [Fast Routing For Hack](https://github.com/hhvm/hack-router)
 - [Dependency Injection Container For HHVM/Hack](https://github.com/nazg-hack/glue)
 - [Request/Response Middleware Component](https://github.com/nazg-hack/heredity)

## Create Project

```bash
$ composer create-project nazg/skeleton nazg-app-sample --prefer-dist
```

## For Develop

Execute the hh-autoload.hack script each time you add the class file.

For Example  

```bash
$ hhvm ./vendor/bin/hh-autoload.hack
```

## Testing

```bash
$ hhvm ./vendor/bin/hacktest.hack tests/
```

## CLI Tools

CLI Tools Provided by Default

### Cache Clear Command

for [Nazg\HCache](https://github.com/nazg-hack/hcache)

```bash
$ hhvm ./bin/cache-clear.hack
```

### Container Cache Clear Command

for [Nazg\Glue](https://github.com/nazg-hack/glue)

```bash
$ hhvm ./bin/container-cache-clear.hack 
```

## Docker

Using [hhvm/hhvm-proxygen:latest](https://hub.docker.com/r/hhvm/hhvm-proxygen/tags) and [nginx:1.17-alpine](https://hub.docker.com/_/nginx/?tab=tags) Containers

```bash
$ docker-compose up -d
$ docker-compose exec hhvm /bin/bash -c 'cd /var/www && composer update'
```

### Composer Scripts

#### Class Registrarion

```bash
docker-compose exec hhvm /bin/bash -c 'cd /var/www && composer register'
```

#### Testing

```bash
docker-compose exec hhvm /bin/bash -c 'cd /var/www && composer tests'
```

## Framework Repository

[Framework](https://github.com/ytake/nazg-framework)

## License

The Nazg Framework is licensed under The MIT License (MIT). See [License File](LICENSE) for more information.
