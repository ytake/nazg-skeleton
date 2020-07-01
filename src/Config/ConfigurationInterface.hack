namespace App\Config;

interface ConfigurationInterface<T> {

  public function getConfiguration(): T;
}
