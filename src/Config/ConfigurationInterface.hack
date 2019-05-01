namespace App\Config;

interface ConfigurationInterface {
  abstract const type T;

  public function getConfiguration(): this::T;
}
