namespace App\Config;

use type Facebook\Experimental\Http\Message\HTTPMethod;
use type Nazg\Cache\Driver;
use type Nazg\Foundation\ConsistentServiceProvider;
use type Nazg\Http\Server\AsyncMiddlewareInterface;

type CacheType = shape(
  'cache_driver' => Driver,
  'file' => shape(
    'cacheStoreDir' => string
  ),
  'memcached' => shape(
    'servers' => vec<shape(
      'host' => string,
      'port' => int,
      ?'weight' => int,
    )>,
    ?'persistentId' => string,
  )
);

type ProvidersType = vec<classname<ConsistentServiceProvider>>;

type RoutesType = dict<HTTPMethod, ImmMap<string, shape(
  'middleware' => vec<classname<AsyncMiddlewareInterface>>,
)>>;

type LogType = shape('logfile' => string, 'logname' => string);
