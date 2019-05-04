<?hh // partial
/**
 * This configuration cache file was generated at 2019-05-05T01:05:25+09:00
 */
return dict [
  'cache' => 
  array (
    'cache_driver' => 'file',
    'file' => 
    array (
      'cacheStoreDir' => '/Applications/MAMP/htdocs/nazg-skeleton/storages/cache',
    ),
    'memcached' => 
    array (
      'servers' => 
      vec [
        array (
          'host' => 'localhost',
          'port' => 11211,
        ),
      ],
    ),
  ),
  'config_cache_enabled' => 1,
  'logs' => 
  array (
    'logfile' => '/Applications/MAMP/htdocs/nazg-skeleton/storages/logs/app.log',
    'logname' => 'applog',
  ),
  'providers' => 
  vec [
    'App\\Providers\\ActionProvider',
  ],
  'routes' => 
  dict [
    'GET' => 
    HH\ImmMap {
      '/' => 
      array (
        'middleware' => 
        vec [
          'App\\Action\\IndexAction',
        ],
      ),
    },
  ],
];