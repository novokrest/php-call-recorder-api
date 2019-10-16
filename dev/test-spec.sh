if [ $# -lt 1 ]; then
    echo 'Specify operation name in camel case'
    exit -1
fi

set -x
cd tmp/SwaggerClient-php
./vendor/bin/phpunit --bootstrap vendor/autoload.php --filter $1 test/Api/DefaultApiTest.php
cd -

