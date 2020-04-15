use type App\Http\HalResponse;
use type HH\Lib\IO\CloseableWriteHandle;
use type Ytake\Hungrr\Response\HtmlResponse;
use type Facebook\Experimental\Http\Message\ResponseInterface;

final class IndexXhpResponder {

  public async function invokeAsync(
    CloseableWriteHandle $writeHandle,
    dict<arraykey, mixed> $data = dict[]
  ): Awaitable<ResponseInterface> {
    $html = <arrived />;
		$ui = <component-link />;
    await $writeHandle->writeAsync($html->toString() . $ui->toString());
    await $writeHandle->closeAsync();
    return new HtmlResponse($writeHandle);
  }
}

class :arrived extends :x:element {
  protected function render(): \XHPRoot {
    return <div><strong>Nazg Framework / Arraived.</strong></div>;
  }
}

class :component-link extends :x:element {
  protected function render(): \XHPRoot {
    return <a href="/hal">hal example</a>;
  }
}
