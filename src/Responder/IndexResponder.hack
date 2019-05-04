namespace App\Responder;

use type App\Http\HalResponse;
use type HH\Lib\Experimental\IO\WriteHandle;
use type Ytake\Hhypermedia\Serializer\HalJsonSerializer;
use type Ytake\Hhypermedia\Visitor\JsonSerializationVisitor;
use type Ytake\Hhypermedia\Link;
use type Ytake\Hhypermedia\LinkResource;
use type Ytake\Hhypermedia\Serializer;
use type Ytake\Hhypermedia\HalResource;
use type Ytake\Hhypermedia\ResourceObject;
use type Facebook\Experimental\Http\Message\ResponseInterface;

final class IndexResponder {

  public async function invokeAsync(
    WriteHandle $writeHandle,
    dict<arraykey, mixed> $data = dict[]
  ): Awaitable<ResponseInterface> {
    $ro = new ResourceObject()
    |> $$->withLink(
      new Link('self', vec[
        new LinkResource('https://github.com/ytake/nazg-skeleton')
      ]
    ));
    $serializer = new Serializer(
      new HalJsonSerializer(),
      new HalResource($ro, $data),
      new JsonSerializationVisitor(\JSON_UNESCAPED_SLASHES)
    );
    await $writeHandle->writeAsync($serializer->serialize());
    await $writeHandle->closeAsync();
    return new HalResponse($writeHandle);
  }
}
