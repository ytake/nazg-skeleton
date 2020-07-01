namespace App\Config;

use type Nazg\Cache\Driver;
use namespace Ytake\Dotenv;

final class Cache implements ConfigurationInterface<CacheType> {

  public function getConfiguration(): CacheType {
    $driver = Dotenv\env('CACHE_DRIVER', Driver::File);
    $driver as Driver;
    return shape(
      'cache_driver' => $driver,
      'file' => shape(
        'cacheStoreDir' => \realpath(__DIR__ . '/../storages/cache'),        
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
