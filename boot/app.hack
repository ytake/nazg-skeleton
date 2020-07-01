require_once __DIR__.'/../vendor/hh_autoload.hh';

use type Nazg\Glue\ContainerBuilder;
use namespace App\Config;
use namespace Nazg\Foundation;
use namespace HH\Lib\IO;
use namespace Ytake\HHConfigAggreagator;

function bootApp(): Foundation\Application {

  $cache = (new Config\Cache())->getConfiguration();
  $appConfig = new Config\ApplicationConfig();
  $appConfig->setMemcachedCacheConfig($cache['memcached']);
  $appConfig->setCacheDriver($cache['cache_driver']);
  $appConfig->setFilesystemCacheConfig($cache['file']);
  $appConfig->setRoutes((new Config\Routes())->getConfiguration());
  $appConfig->setServiceProviders((new Config\Provider())->getConfiguration());
  $appConfig->setLogConfig((new Config\Log())->getConfiguration());

  list($read, $write) = IO\pipe_nd();
  $builder = new ContainerBuilder();
  return new Foundation\Application($builder->make(), $read, $write)
  |> $$->build($appConfig);
}
