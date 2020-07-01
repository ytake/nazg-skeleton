namespace App\Config;

use type Facebook\Experimental\Http\Message\HTTPMethod;

final class Routes implements ConfigurationInterface<RoutesType> {

  public function getConfiguration(): RoutesType {
    return dict[
      HTTPMethod::GET => ImmMap{
        '/' => shape(
          'middleware' => vec[
            \App\Action\IndexAction::class,
          ],
        ),
        '/hal' => shape(
          'middleware' => vec[
            \App\Action\Hal\IndexAction::class,
          ],
        )
      }
    ];
  }
}
