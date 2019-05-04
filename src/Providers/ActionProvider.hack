namespace App\Providers;

use namespace App\Action;
use type Nazg\Foundation\ConsistentServiceProvider;

final class ActionProvider extends ConsistentServiceProvider {

  <<__Override>>
  public function apply(): void {
    $this->container
      ->bind(Action\IndexAction::class)
      ->provider(new Action\IndexActionProvider());
  }
}
