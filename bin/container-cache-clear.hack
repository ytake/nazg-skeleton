#!/usr/bin/env hhvm

require_once(__DIR__ . '/../vendor/hh_autoload.hh');
require_once __DIR__.'/../boot/app.hack';

use type Nazg\Foundation\Command\ContainerCacheClear;

<<__EntryPoint>>
async function containerCacheClearMain(): Awaitable<void> {
  ContainerCacheClear::setApplication(bootApp());
  await ContainerCacheClear::runAsync();
}
