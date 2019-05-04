<?hh // partial

use namespace Ytake\Dotenv;
use namespace Ytake\HHConfigAggreagator;

/**
 *
 */
return dict[
  HHConfigAggreagator\CacheConfig::KEYNAME
    // for production -> HHConfigAggreagator\Cache::ENABLE
    => HHConfigAggreagator\Cache::DISABLE,
];
