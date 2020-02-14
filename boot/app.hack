require_once __DIR__.'/../vendor/hh_autoload.hh';

use type Nazg\Glue\ContainerBuilder;
use namespace App\Config;
use namespace Nazg\Foundation;
use namespace HH\Lib\Experimental\IO;
use namespace Ytake\HHConfigAggreagator;

function bootApp(): Foundation\Application {
  $aggregator = new HHConfigAggreagator\ConfigAggreagator(
    vec[
      new HHConfigAggreagator\PhpFileProvider(__DIR__.'/../config/{{,*.}global,{,*.}local}.php',)
    ],
    __DIR__. '/../storages/cached.config.cache.php'
  );
  $config = $aggregator->getMergedConfig();
  $cacheConfig = $config['cache'];
  $appConfig = new Config\ApplicationConfig();
  /* HH_FIXME[4063] config dict access */
  $appConfig->setMemcachedCacheConfig($cacheConfig['memcached']);
  /* HH_FIXME[4063] config dict access */
  $appConfig->setCacheDriver($cacheConfig['cache_driver']);
  /* HH_FIXME[4063] config dict access */
  $appConfig->setFilesystemCacheConfig($cacheConfig['file']);
  /* HH_FIXME[4110] config dict access */
  $appConfig->setRoutes($config['routes']);
  /* HH_FIXME[4110] config dict access */
  $appConfig->setServiceProviders($config['providers']);
  /* HH_FIXME[4110] config dict access */
  $appConfig->setLogConfig($config['logs']);
  list($read, $write) = IO\pipe_nd();
  $builder = new ContainerBuilder();
  return new Foundation\Application($builder->make(), $read, $write)
  |> $$->build($appConfig);
}
