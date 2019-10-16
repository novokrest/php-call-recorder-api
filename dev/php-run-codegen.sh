rm -rf tmp/SwaggerClient-php/test/
java \
   -DdebugOperations \
   -DgenerateModels=true \
   -DgenerateApis=true \
   -DsupportingFiles=true \
   -DgenerateApiTests=true \
    -cp generators-call-recorder-api/tools/swagger-codegen-cli.jar:generators-call-recorder-api/generators/target/generators-swagger-codegen-1.0.0.jar io.swagger.codegen.v3.cli.SwaggerCodegen generate -l php-cra -i docs/spec.yml -o ./tmp --template-engine mustache

