namespace App\Providers;

use type Nazg\Foundation\ConsistentServiceProvider;

final class ActionProvider extends ConsistentServiceProvider {

  <<__Override>>
  public function apply(): void {
    $this->container
      ->bind(\App\Action\IndexAction::class)
      ->to(\App\Action\IndexAction::class);
  }
}
