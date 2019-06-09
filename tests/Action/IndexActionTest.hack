use type App\Action\IndexAction;
use type App\Http\HalResponse;
use type App\Responder\IndexResponder;
use type Facebook\HackTest\HackTest;
use type Ytake\Hungrr\StatusCode;
use type Ytake\Hungrr\ServerRequestFactory;
use type Nazg\RequestHandler\AsyncFallbackHandler;
use namespace HH\Lib\Experimental\IO;
use function Facebook\FBExpect\expect;

final class IndexActionTest extends HackTest {

  public function testShouldReturnActionInstance(): void {
    expect(
      new IndexAction(new IndexResponder())
    )->toBeInstanceOf(IndexAction::class);
  }

  public async function testShouldReturnResponse(): Awaitable<void> {
    list($read, $write) = IO\pipe_non_disposable();
    $action = new IndexAction(new IndexResponder());
    $process = await $action->processAsync(
      $write,
      ServerRequestFactory::fromGlobals($read),
      new AsyncFallbackHandler()
    );
    expect($process)->toBeInstanceOf(HalResponse::class);
    expect($process->getStatusCode())->toBeSame(StatusCode::OK);
    $headers = $process->getHeaders();
    expect($headers['content-type'][0])->toBeSame('application/hal+json; charset=utf-8');
  }
}
