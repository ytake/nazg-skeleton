use type App\Http\HalResponse;
use type Facebook\HackTest\HackTest;
use namespace HH\Lib\IO;
use function Facebook\FBExpect\expect;

final class HalResponseTest extends HackTest {

  public async function testShouldReturnEmptyJsonBody(): Awaitable<void> {
    list($read, $write) = IO\pipe();
    $r = new HalResponse($write);
    await $write->writeAsync(\json_encode(dict[]));
    expect($r->getStatusCode())->toBeSame(200);
    expect($r->getProtocolVersion())->toBeSame('1.1');
    expect($r->getReasonPhrase())->toBeSame('OK');
    expect($r->getHeaders())->toBeSame(dict[
      'content-type' => vec['application/hal+json; charset=utf-8'],
    ]);
    $write->close();
    $re = $r->getBody();
    expect(await $read->readAsync())->toBeSame('{}');
  }

  public async function testShouldReturnJsonBody(): Awaitable<void> {
    list($read, $write) = IO\pipe();
    await $write->writeAsync(\json_encode(new ImmMap(dict[
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
    $re = $r->getBody();
    if($re is \HH\Lib\_Private\_IO\PipeWriteHandle) {
      $re->close();
    }
    $re = await $read->readAsync();
    expect($re)->toBeSame('{"testing":{"HHVM":"Hack"}}');
  }
}
