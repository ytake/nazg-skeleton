<?hh

namespace AppTest\Action;

use App\Action\IndexAction;
use App\Responder\IndexResponder;
use AppTest\AppStubRequestHandler;
use PHPUnit\Framework\TestCase;
use Zend\Diactoros\ServerRequestFactory;
use function Facebook\FBExpect\expect;

class IndexActionTest extends TestCase {

  public function testShouldBe(): void {
    $action = new IndexAction(new IndexResponder());
    $result = $action->process(
      ServerRequestFactory::fromGlobals(),
      new AppStubRequestHandler()
    );
    expect($result)
      ->toBeInstanceOf(\Zend\Diactoros\Response::class);
    expect($result->getBody()->getContents())
      ->toContain('Begin developing HHVM/Hack Http Application');
  }
}
