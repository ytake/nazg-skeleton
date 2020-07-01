namespace App\Config;

final class Log implements ConfigurationInterface<LogType> {

  public function getConfiguration(): LogType {
    return shape(
      'logfile' => \realpath(__DIR__ . '/../storages/logs/app.log'),
      'logname' => 'applog'
    );
  }
}
