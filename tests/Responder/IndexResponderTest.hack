use type App\Responder\IndexResponder;
use type Facebook\HackTest\HackTest;
use type Facebook\Experimental\Http\Message\ResponseInterface;
use namespace HH\Lib\Experimental\IO;
use function Facebook\FBExpect\expect;

final class IndexResponderTest extends HackTest {

  public async function testShouldReturnResponderInstance(): Awaitable<void> {
    $responder = new IndexResponder();
    list($_, $write) = IO\pipe_non_disposable();
    $response = await $responder->invokeAsync($write);
    expect($response)->toBeInstanceOf(ResponseInterface::class);
  }

  public async function testShouldReturnResponderInstance1(): Awaitable<void> {
    $responder = new IndexResponder();
    list($read, $write) = IO\pipe_non_disposable();
    $response = await $responder->invokeAsync($write);
    $body = await $read->readAsync();
    expect($body)
      ->toBeSame('{"_links":{"self":{"href":"https://github.com/ytake/nazg-skeleton"}}}');
  }
}
