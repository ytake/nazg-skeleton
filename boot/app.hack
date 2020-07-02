require_once __DIR__.'/../vendor/hh_autoload.hh';

use type Nazg\Glue\ContainerBuilder;
use namespace App\Config;
use namespace Nazg\Foundation;
use namespace HH\Lib\IO;
use namespace Ytake\HHConfigAggreagator;

async function bootApp(): Awaitable<Foundation\Application> {

  $cache = (new Config\Cache())->getConfiguration();
  $appConfig = new Config\ApplicationConfig();
  concurrent {
    await $appConfig->setLogConfigAsync((new Config\Log())->getConfiguration());
    await $appConfig->setRoutesAsync((new Config\Routes())->getConfiguration());
    await $appConfig->setMemcachedCacheConfigAsync($cache['memcached']);
    await $appConfig->setCacheDriverAsync($cache['cache_driver']);
    await $appConfig->setFilesystemCacheConfigAsync($cache['file']);
    await $appConfig->setServiceProvidersAsync((new Config\Provider())->getConfiguration());
  }

  list($read, $write) = IO\pipe_nd();
  $builder = new ContainerBuilder();
  return new Foundation\Application($builder->make(), $read, $write)
  |> $$->build($appConfig);
}
