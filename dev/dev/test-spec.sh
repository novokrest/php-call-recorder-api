if [ $# -lt 1 ]; then
    echo 'Specify operation name in camel case'
    exit -1
fi

set -x
TEST="#$1()" npm run test-specific
