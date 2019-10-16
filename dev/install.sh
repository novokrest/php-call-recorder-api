rm -rf src/main
rm -rf src/test

mkdir -p src/main/model
mkdir -p src/test

cp tmp/src/api/*.js src/main/
cp tmp/src/model/*.js src/main/model/
cp tmp/src/test/*.js src/test/
cp tmp/src/package-index.js index.js
