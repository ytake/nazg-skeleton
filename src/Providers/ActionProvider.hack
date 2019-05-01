namespace App\Providers;

use type Nazg\Glue\Container;
use type Nazg\Glue\ProviderInterface;
use type Nazg\Foundation\ConsistentServiceProvider;

final class ActionProvider extends ConsistentServiceProvider {

  public function apply(): void {
    $this->container
      ->bind(\App\Action\IndexAction::class)
      ->to(\App\Action\IndexAction::class);
  }
}
