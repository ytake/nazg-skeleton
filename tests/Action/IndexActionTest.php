<?hh

namespace AppTest\Action;

use type App\Action\IndexAction;
use type App\Responder\IndexJsonResponder;
use type AppTest\AppStubRequestHandler;
use type PHPUnit\Framework\TestCase;
use type Zend\Diactoros\ServerRequestFactory;
use function Facebook\FBExpect\expect;

class IndexActionTest extends TestCase {

  public function testShouldBe(): void {
    $action = new IndexAction(new IndexJsonResponder());
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
