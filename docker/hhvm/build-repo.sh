#!/bin/sh
set -e

echo "** Building repository"
set -x
hhvm --hphp --target hhbc \
  -l3 \
  --module src \
  --module vendor \
  --module build/final \
  --ffile public/index.hack \
  --cmodule public \
  --cmodule build/final \
  $(find guides -type f -name '*.txt' | sed 's,^,--cfile ,') \
  --output-dir /var/out \
  --file-cache /var/out/file.cache
set +x

echo "** Listing outputs"
ls -lh /var/out
