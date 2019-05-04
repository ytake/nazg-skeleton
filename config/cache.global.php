<?hh // partial

use type Nazg\Cache\Driver;
use namespace Ytake\Dotenv;

/**
 * cache type 
 *
 * @see \App\Config\CacheType
 */
return dict[
  'cache' => shape(
    'cache_driver' => Dotenv\env('CACHE_DRIVER', Driver::File),
    'file' => shape(
      'cacheStoreDir' => realpath(__DIR__ . '/../storages/cache'),        
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
  )
];
