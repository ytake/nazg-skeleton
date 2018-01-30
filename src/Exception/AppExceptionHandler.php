<?hh // strict

namespace App\Exception;

use Nazg\Types\ExceptionImmMap;
use Nazg\Foundation\Exception\ExceptionHandler;
use Psr\Http\Message\ResponseInterface;

class AppExceptionHandler extends ExceptionHandler {
  <<__Override>>
  protected function render(
    ExceptionImmMap $em,
    \Exception $e
  ): ResponseInterface {
    return parent::render($em, $e);
  }
}
