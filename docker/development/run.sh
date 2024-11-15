#!/bin/sh

export CHROME_BIN=/usr/bin/chromium
export DUSK_WEBDRIVER_BIN=/usr/bin/chromedriver

command=octane
if [ "$#" -gt 0 ]; then
    command="$1"
    shift
fi

# commands
_job() {
    exec ./artisan queue:listen --queue=notification,default,beatmap_high,beatmap_default,store-notifications --tries=3 --timeout=1000
}

_migrate() {
    ./artisan db:create
    exec ./artisan migrate:fresh-or-run
}

_octane() {
  exec ./artisan octane:start --host=0.0.0.0 "$@"
}

_schedule() {
    exec ./artisan schedule:work
}

_test() {
    command=phpunit
    if [ "$#" -gt 0 ]; then
        command="$1"
        shift
    fi

    case "$command" in
        browser) _test_browser "$@";;
        js) exec yarn karma start --single-run --browsers ChromeHeadless "$@";;
        phpunit) exec ./bin/phpunit.sh "$@";;
    esac
}

_test_browser() {
    export APP_ENV=dusk.local
    exec ./artisan dusk "$@"
}


_watch() {
    yarn --network-timeout 100000
    exec yarn watch
}

case "$command" in
    artisan) exec ./artisan "$@";;
    job|migrate|octane|schedule|test|watch) "_$command" "$@";;
    *) exec "$command" "$@";;
esac
