namespace App\Config;

use type Facebook\Experimental\Http\Message\HTTPMethod;

final class RouteConfig implements ConfigurationInterface {
  const type T = dict<HTTPMethod, ImmMap<string, \Nazg\Routing\TResponder>>;

  public function getConfiguration(): this::T {
    return dict[
      HTTPMethod::GET => ImmMap{
        '/' => shape(
          'middleware' => vec[
            \App\Action\IndexAction::class,
          ],
        )
      }
    ];
  }
}
