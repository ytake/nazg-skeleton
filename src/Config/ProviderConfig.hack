namespace App\Config;

use type Nazg\Foundation\ConsistentServiceProvider;

final class ProviderConfig implements ConfigurationInterface {

  const type T = vec<classname<ConsistentServiceProvider>>;

  public function getConfiguration(): this::T {
    return vec[
      \App\Providers\ActionProvider::class,
    ];
  }
}
