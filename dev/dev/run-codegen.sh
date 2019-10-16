rm -rf tmp
java \
   -DdebugOperations \
   -DgenerateModels=true \
   -DgenerateApis=true \
   -DsupportingFiles=true \
   -DgenerateApiTests=true \
    -cp tools/swagger-codegen-cli.jar:generators/target/nodejs-swagger-codegen-1.0.0.jar io.swagger.codegen.v3.cli.SwaggerCodegen generate -l nodejs -i docs/spec.yml -o ./tmp

