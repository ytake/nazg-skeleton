use type App\Http\HalResponse;
use type Facebook\HackTest\HackTest;
use namespace HH\Lib\Experimental\IO;
use function Facebook\FBExpect\expect;

final class HalResponseTest extends HackTest {

  public async function testShouldReturnEmptyJsonBody(): Awaitable<void> {
    list($read, $write) = IO\pipe_non_disposable();
    $r = new HalResponse($write);
    await $write->writeAsync(\json_encode(new ImmMap([])));
    expect($r->getStatusCode())->toBeSame(200);
    expect($r->getProtocolVersion())->toBeSame('1.1');
    expect($r->getReasonPhrase())->toBeSame('OK');
    expect($r->getHeaders())->toBeSame(dict[
      'content-type' => vec['application/hal+json; charset=utf-8'],
    ]);
    await $r->getBody()->closeAsync();
    $re = await $read->readAsync();
    expect($re)->toBeSame('{}');
  }

  public async function testShouldReturnJsonBody(): Awaitable<void> {
    list($read, $write) = IO\pipe_non_disposable();
    await $write->writeAsync(\json_encode(new ImmMap([
      'testing' => ImmMap{
        'HHVM' => 'Hack'
      }
    ])));
    $r = new HalResponse($write);
    expect($r->getStatusCode())->toBeSame(200);
    expect($r->getProtocolVersion())->toBeSame('1.1');
    expect($r->getReasonPhrase())->toBeSame('OK');
    expect($r->getHeaders())->toBeSame(dict[
      'content-type' => vec['application/hal+json; charset=utf-8'],
    ]);
    await $r->getBody()->closeAsync();
    $re = await $read->readAsync();
    expect($re)->toBeSame('{"testing":{"HHVM":"Hack"}}');
  }
}
