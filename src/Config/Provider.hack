namespace App\Config;

final class Provider implements ConfigurationInterface<ProvidersType> {

  public function getConfiguration(): ProvidersType {
    return vec[
      \App\Providers\ActionProvider::class,
    ];
  }
}
