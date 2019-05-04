namespace App\Http;

use type Ytake\Hungrr\Response\JsonResponse;
use type Ytake\Hungrr\StatusCode;
use type Ytake\Hungrr\Response\InjectContentTypeTrait;
use namespace HH\Lib\Experimental\IO;

final class HalResponse extends JsonResponse {

  use InjectContentTypeTrait;

  public function __construct(
    private IO\WriteHandle $body,
    StatusCode $status = StatusCode::OK,
    dict<string, vec<string>> $headers = dict[]
  ) {
    parent::__construct(
      $body,
      $status,
      /* HH_FIXME[3004] */
      $this->injectContentType(
        'application/hal+json; charset=utf-8',
        $headers
      ),
    );
  }
}
