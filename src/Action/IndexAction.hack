namespace App\Action;

use type HH\Lib\Experimental\IO\WriteHandle;
use type Facebook\Experimental\Http\Message\ResponseInterface;
use type Facebook\Experimental\Http\Message\ServerRequestInterface;
use type Nazg\Http\Server\AsyncMiddlewareInterface;
use type Nazg\Http\Server\AsyncRequestHandlerInterface;
use type Ytake\Hungrr\Response\JsonResponse;
use type Ytake\Hhypermedia\Serializer\HalJsonSerializer;
use type Ytake\Hhypermedia\Link;
use type Ytake\Hhypermedia\LinkResource;
use type Ytake\Hhypermedia\Serializer;
use type Ytake\Hhypermedia\HalResource;
use type Ytake\Hhypermedia\ResourceObject;
use function json_encode;

final class IndexAction implements AsyncMiddlewareInterface {

  public async function processAsync(
    WriteHandle $writeHandle,
    ServerRequestInterface $_,
    AsyncRequestHandlerInterface $_,
  ): Awaitable<ResponseInterface> {

    $ro = new ResourceObject()
    |> $$->withLink(new Link('self', vec[
      new LinkResource('https://github.com/ytake/nazg-skeleton')
    ]));
    $s = new Serializer(new HalJsonSerializer(), new HalResource($ro, dict[
      'name' => 'nazg',
      'message' => 'arrived.'
    ]));
    await $writeHandle->writeAsync(
      json_encode(
        $s->serialize(),
        \JSON_PRETTY_PRINT
      )
    );
    await $writeHandle->closeAsync();
    return new JsonResponse($writeHandle);
  }
}
