namespace App\Action;

use type IndexXhpResponder;
use type Nazg\Glue\Container;
use type Nazg\Glue\ProviderInterface;

final class IndexActionProvider
  implements ProviderInterface<IndexAction> {

  public function get(
    Container $_
  ): IndexAction {
    return new IndexAction(new IndexXhpResponder());
  }
}
