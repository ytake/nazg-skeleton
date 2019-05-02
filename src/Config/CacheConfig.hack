namespace App\Config;

use type Nazg\Cache\Driver;
use function realpath;

final class CacheConfig implements ConfigurationInterface {

  const type T = shape(
    'cache_driver' => Driver,
    'file' => shape('cacheStoreDir' => string),
    'memcached' => shape(
      'servers' => vec<shape(
        'host' => string,
        'port' => int,
        ?'weight' => int,
      )>,
      ?'persistentId' => string,
    )
  );

  public function getConfiguration(): this::T {
    return shape(
      'cache_driver' => Driver::File,
      'file' => shape(
        'cacheStoreDir' => realpath(__DIR__ . '/../../storages/cache'),
      ),
      'memcached' => shape(
        'servers' => vec[
          shape(
            'host' => 'localhost',
            'port' => 11211,
            // 'weight' => 100
          )
        ],
        // 'persistentId' => '',
      ),
    );
  }
}
