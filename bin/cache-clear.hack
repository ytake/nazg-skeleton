#!/usr/bin/env hhvm

require_once(__DIR__ . '/../vendor/hh_autoload.hh');
require_once __DIR__.'/../boot/app.hack';

use type Nazg\Foundation\Command\ApplicationCacheClear;

<<__EntryPoint>>
async function cacheClearMain(): Awaitable<void> {
  ApplicationCacheClear::setApplication(bootApp());
  await ApplicationCacheClear::runAsync();
}
