<?hh // strict

namespace App\Module;

use App\Action\IndexAction;
use Ytake\HHContainer\Scope;
use Ytake\HHContainer\ServiceModule;
use Ytake\HHContainer\FactoryContainer;

final class ActionServiceModule extends ServiceModule {

  public function provide(FactoryContainer $container): void
  {
    $container->set(
      IndexAction::class,
      $container ==> new IndexAction(),
      Scope::PROTOTYPE
    );
  } 
}
