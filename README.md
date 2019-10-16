# Call Recorder API

- API version: 1.0.0
- Build package: com.generators.codegen.php.PhpGenerator

## Requirements

PHP 7.3 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$amount = 789; // int | 
$receipt = "receipt_example"; // string | 
$product_id = 789; // int | 
$device_type = new \Swagger\Client\Model\DeviceType(); // \Swagger\Client\Model\DeviceType | 

try {
    $result = $apiInstance->buyCreditsPost($api_key, $amount, $receipt, $product_id, $device_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->buyCreditsPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$id = 789; // int | 

try {
    $result = $apiInstance->cloneFilePost($api_key, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->cloneFilePost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$file = "file_example"; // string | 
$data = new \Swagger\Client\Model\CreateFileData(); // \Swagger\Client\Model\CreateFileData | 

try {
    $result = $apiInstance->createFilePost($api_key, $file, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->createFilePost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$name = "name_example"; // string | 
$pass = "pass_example"; // string | 

try {
    $result = $apiInstance->createFolderPost($api_key, $name, $pass);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->createFolderPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$ids = array(56); // int[] | 
$action = "action_example"; // string | 

try {
    $result = $apiInstance->deleteFilesPost($api_key, $ids, $action);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->deleteFilesPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$id = 789; // int | 
$move_to = 789; // int | 

try {
    $result = $apiInstance->deleteFolderPost($api_key, $id, $move_to);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->deleteFolderPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$ids = array(56); // int[] | 
$parent_id = 789; // int | 

try {
    $result = $apiInstance->deleteMetaFilesPost($api_key, $ids, $parent_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->deleteMetaFilesPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$page = "page_example"; // string | 
$folder_id = 789; // int | 
$source = "source_example"; // string | 
$pass = "pass_example"; // string | 
$reminder = true; // bool | 
$q = "q_example"; // string | 
$id = 789; // int | 
$op = "op_example"; // string | 

try {
    $result = $apiInstance->getFilesPost($api_key, $page, $folder_id, $source, $pass, $reminder, $q, $id, $op);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getFilesPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 

try {
    $result = $apiInstance->getFoldersPost($api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getFoldersPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 

try {
    $result = $apiInstance->getLanguagesPost($api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getLanguagesPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$parent_id = 789; // int | 

try {
    $result = $apiInstance->getMetaFilesPost($api_key, $parent_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getMetaFilesPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 

try {
    $result = $apiInstance->getMsgsPost($api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getMsgsPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 

try {
    $result = $apiInstance->getPhonesPost($api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getPhonesPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 

try {
    $result = $apiInstance->getProfilePost($api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getProfilePost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 

try {
    $result = $apiInstance->getSettingsPost($api_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getSettingsPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$language = "language_example"; // string | 

try {
    $result = $apiInstance->getTranslationsPost($api_key, $language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getTranslationsPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$title = "title_example"; // string | 
$body = "body_example"; // string | 
$device_type = new \Swagger\Client\Model\DeviceType(); // \Swagger\Client\Model\DeviceType | 

try {
    $result = $apiInstance->notifyUserCustomPost($api_key, $title, $body, $device_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->notifyUserCustomPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$id = 789; // int | 
$folder_id = 789; // int | 

try {
    $result = $apiInstance->recoverFilePost($api_key, $id, $folder_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->recoverFilePost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = "token_example"; // string | 
$phone = "phone_example"; // string | 

try {
    $result = $apiInstance->registerPhonePost($token, $phone);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->registerPhonePost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$device_token = "device_token_example"; // string | 
$device_type = new \Swagger\Client\Model\DeviceType(); // \Swagger\Client\Model\DeviceType | 

try {
    $result = $apiInstance->updateDeviceTokenPost($api_key, $device_token, $device_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateDeviceTokenPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$id = 789; // int | 
$f_name = "f_name_example"; // string | 
$l_name = "l_name_example"; // string | 
$notes = "notes_example"; // string | 
$email = "email_example"; // string | 
$phone = "phone_example"; // string | 
$tags = "tags_example"; // string | 
$folder_id = 789; // int | 
$name = "name_example"; // string | 
$remind_days = "remind_days_example"; // string | 
$remind_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | 

try {
    $result = $apiInstance->updateFilePost($api_key, $id, $f_name, $l_name, $notes, $email, $phone, $tags, $folder_id, $name, $remind_days, $remind_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateFilePost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$id = 789; // int | 
$name = "name_example"; // string | 
$pass = "pass_example"; // string | 
$is_private = true; // bool | 

try {
    $result = $apiInstance->updateFolderPost($api_key, $id, $name, $pass, $is_private);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateFolderPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$folders = array(new \Swagger\Client\Model\UpdateOrderRequestFolder()); // \Swagger\Client\Model\UpdateOrderRequestFolder[] | 

try {
    $result = $apiInstance->updateOrderPost($api_key, $folders);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateOrderPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$file = "file_example"; // string | 

try {
    $result = $apiInstance->updateProfileImgPost($api_key, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateProfileImgPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$data = new \Swagger\Client\Model\UpdateProfileRequestData(); // \Swagger\Client\Model\UpdateProfileRequestData | 

try {
    $result = $apiInstance->updateProfilePost($api_key, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateProfilePost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$play_beep = new \Swagger\Client\Model\PlayBeep(); // \Swagger\Client\Model\PlayBeep | 
$files_permission = new \Swagger\Client\Model\FilesPermission(); // \Swagger\Client\Model\FilesPermission | 

try {
    $result = $apiInstance->updateSettingsPost($api_key, $play_beep, $files_permission);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateSettingsPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$id = 789; // int | 
$star = 56; // int | 
$type = "type_example"; // string | 

try {
    $result = $apiInstance->updateStarPost($api_key, $id, $star, $type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateStarPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$app = new \Swagger\Client\Model\App(); // \Swagger\Client\Model\App | 
$time_zone = "time_zone_example"; // string | 

try {
    $result = $apiInstance->updateUserPost($api_key, $app, $time_zone);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateUserPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$file = "file_example"; // string | 
$name = "name_example"; // string | 
$parent_id = 789; // int | 
$id = 789; // int | 

try {
    $result = $apiInstance->uploadMetaFilePost($api_key, $file, $name, $parent_id, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->uploadMetaFilePost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$id = 789; // int | 
$pass = "pass_example"; // string | 

try {
    $result = $apiInstance->verifyFolderPassPost($api_key, $id, $pass);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->verifyFolderPassPost: ', $e->getMessage(), PHP_EOL;
}

$apiInstance = new Swagger\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = "token_example"; // string | 
$phone = "phone_example"; // string | 
$code = "code_example"; // string | 
$mcc = "mcc_example"; // string | 
$app = new \Swagger\Client\Model\App(); // \Swagger\Client\Model\App | 
$device_token = "device_token_example"; // string | 
$device_id = "device_id_example"; // string | 
$device_type = new \Swagger\Client\Model\DeviceType(); // \Swagger\Client\Model\DeviceType | 
$time_zone = "time_zone_example"; // string | 

try {
    $result = $apiInstance->verifyPhonePost($token, $phone, $code, $mcc, $app, $device_token, $device_id, $device_type, $time_zone);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->verifyPhonePost: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://app2.virtualbrix.net/rapi*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DefaultApi* | [**buyCreditsPost**](docs/Api/DefaultApi.md#buycreditspost) | **POST** /buy_credits | 
*DefaultApi* | [**cloneFilePost**](docs/Api/DefaultApi.md#clonefilepost) | **POST** /clone_file | 
*DefaultApi* | [**createFilePost**](docs/Api/DefaultApi.md#createfilepost) | **POST** /create_file | 
*DefaultApi* | [**createFolderPost**](docs/Api/DefaultApi.md#createfolderpost) | **POST** /create_folder | 
*DefaultApi* | [**deleteFilesPost**](docs/Api/DefaultApi.md#deletefilespost) | **POST** /delete_files | 
*DefaultApi* | [**deleteFolderPost**](docs/Api/DefaultApi.md#deletefolderpost) | **POST** /delete_folder | 
*DefaultApi* | [**deleteMetaFilesPost**](docs/Api/DefaultApi.md#deletemetafilespost) | **POST** /delete_meta_files | 
*DefaultApi* | [**getFilesPost**](docs/Api/DefaultApi.md#getfilespost) | **POST** /get_files | 
*DefaultApi* | [**getFoldersPost**](docs/Api/DefaultApi.md#getfolderspost) | **POST** /get_folders | 
*DefaultApi* | [**getLanguagesPost**](docs/Api/DefaultApi.md#getlanguagespost) | **POST** /get_languages | 
*DefaultApi* | [**getMetaFilesPost**](docs/Api/DefaultApi.md#getmetafilespost) | **POST** /get_meta_files | 
*DefaultApi* | [**getMsgsPost**](docs/Api/DefaultApi.md#getmsgspost) | **POST** /get_msgs | 
*DefaultApi* | [**getPhonesPost**](docs/Api/DefaultApi.md#getphonespost) | **POST** /get_phones | 
*DefaultApi* | [**getProfilePost**](docs/Api/DefaultApi.md#getprofilepost) | **POST** /get_profile | 
*DefaultApi* | [**getSettingsPost**](docs/Api/DefaultApi.md#getsettingspost) | **POST** /get_settings | 
*DefaultApi* | [**getTranslationsPost**](docs/Api/DefaultApi.md#gettranslationspost) | **POST** /get_translations | 
*DefaultApi* | [**notifyUserCustomPost**](docs/Api/DefaultApi.md#notifyusercustompost) | **POST** /notify_user_custom | 
*DefaultApi* | [**recoverFilePost**](docs/Api/DefaultApi.md#recoverfilepost) | **POST** /recover_file | 
*DefaultApi* | [**registerPhonePost**](docs/Api/DefaultApi.md#registerphonepost) | **POST** /register_phone | 
*DefaultApi* | [**updateDeviceTokenPost**](docs/Api/DefaultApi.md#updatedevicetokenpost) | **POST** /update_device_token | 
*DefaultApi* | [**updateFilePost**](docs/Api/DefaultApi.md#updatefilepost) | **POST** /update_file | 
*DefaultApi* | [**updateFolderPost**](docs/Api/DefaultApi.md#updatefolderpost) | **POST** /update_folder | 
*DefaultApi* | [**updateOrderPost**](docs/Api/DefaultApi.md#updateorderpost) | **POST** /update_order | 
*DefaultApi* | [**updateProfileImgPost**](docs/Api/DefaultApi.md#updateprofileimgpost) | **POST** /update_profile_img | 
*DefaultApi* | [**updateProfilePost**](docs/Api/DefaultApi.md#updateprofilepost) | **POST** /update_profile | 
*DefaultApi* | [**updateSettingsPost**](docs/Api/DefaultApi.md#updatesettingspost) | **POST** /update_settings | 
*DefaultApi* | [**updateStarPost**](docs/Api/DefaultApi.md#updatestarpost) | **POST** /update_star | 
*DefaultApi* | [**updateUserPost**](docs/Api/DefaultApi.md#updateuserpost) | **POST** /update_user | 
*DefaultApi* | [**uploadMetaFilePost**](docs/Api/DefaultApi.md#uploadmetafilepost) | **POST** /upload_meta_file | 
*DefaultApi* | [**verifyFolderPassPost**](docs/Api/DefaultApi.md#verifyfolderpasspost) | **POST** /verify_folder_pass | 
*DefaultApi* | [**verifyPhonePost**](docs/Api/DefaultApi.md#verifyphonepost) | **POST** /verify_phone | 


## Documentation For Models

 - [App](docs/Model/App.md)
 - [BuyCreditsRequest](docs/Model/BuyCreditsRequest.md)
 - [BuyCreditsResponse](docs/Model/BuyCreditsResponse.md)
 - [CloneFileRequest](docs/Model/CloneFileRequest.md)
 - [CloneFileResponse](docs/Model/CloneFileResponse.md)
 - [CreateFileData](docs/Model/CreateFileData.md)
 - [CreateFileRequest](docs/Model/CreateFileRequest.md)
 - [CreateFileResponse](docs/Model/CreateFileResponse.md)
 - [CreateFolderRequest](docs/Model/CreateFolderRequest.md)
 - [CreateFolderResponse](docs/Model/CreateFolderResponse.md)
 - [DeleteFilesRequest](docs/Model/DeleteFilesRequest.md)
 - [DeleteFilesResponse](docs/Model/DeleteFilesResponse.md)
 - [DeleteFolderRequest](docs/Model/DeleteFolderRequest.md)
 - [DeleteFolderResponse](docs/Model/DeleteFolderResponse.md)
 - [DeleteMetaFilesRequest](docs/Model/DeleteMetaFilesRequest.md)
 - [DeleteMetaFilesResponse](docs/Model/DeleteMetaFilesResponse.md)
 - [DeviceType](docs/Model/DeviceType.md)
 - [FilesPermission](docs/Model/FilesPermission.md)
 - [GetFilesRequest](docs/Model/GetFilesRequest.md)
 - [GetFilesResponse](docs/Model/GetFilesResponse.md)
 - [GetFilesResponseFile](docs/Model/GetFilesResponseFile.md)
 - [GetFoldersRequest](docs/Model/GetFoldersRequest.md)
 - [GetFoldersResponse](docs/Model/GetFoldersResponse.md)
 - [GetFoldersResponseFolder](docs/Model/GetFoldersResponseFolder.md)
 - [GetLanguagesRequest](docs/Model/GetLanguagesRequest.md)
 - [GetLanguagesResponse](docs/Model/GetLanguagesResponse.md)
 - [GetMessagesRequest](docs/Model/GetMessagesRequest.md)
 - [GetMessagesResponse](docs/Model/GetMessagesResponse.md)
 - [GetMessagesResponseMsg](docs/Model/GetMessagesResponseMsg.md)
 - [GetMetaFilesRequest](docs/Model/GetMetaFilesRequest.md)
 - [GetMetaFilesResponse](docs/Model/GetMetaFilesResponse.md)
 - [GetMetaFilesResponseMetaFiles](docs/Model/GetMetaFilesResponseMetaFiles.md)
 - [GetPhonesRequest](docs/Model/GetPhonesRequest.md)
 - [GetPhonesResponse](docs/Model/GetPhonesResponse.md)
 - [GetPhonesResponsePhone](docs/Model/GetPhonesResponsePhone.md)
 - [GetProfileRequest](docs/Model/GetProfileRequest.md)
 - [GetProfileResponse](docs/Model/GetProfileResponse.md)
 - [GetProfileResponseProfile](docs/Model/GetProfileResponseProfile.md)
 - [GetSettingsRequest](docs/Model/GetSettingsRequest.md)
 - [GetSettingsResponse](docs/Model/GetSettingsResponse.md)
 - [GetSettingsResponseSettings](docs/Model/GetSettingsResponseSettings.md)
 - [GetTranslationsRequest](docs/Model/GetTranslationsRequest.md)
 - [GetTranslationsResponse](docs/Model/GetTranslationsResponse.md)
 - [Language](docs/Model/Language.md)
 - [NotifyUserRequest](docs/Model/NotifyUserRequest.md)
 - [NotifyUserResponse](docs/Model/NotifyUserResponse.md)
 - [PlayBeep](docs/Model/PlayBeep.md)
 - [RecoverFileRequest](docs/Model/RecoverFileRequest.md)
 - [RecoverFileResponse](docs/Model/RecoverFileResponse.md)
 - [RegisterPhoneRequest](docs/Model/RegisterPhoneRequest.md)
 - [RegisterPhoneResponse](docs/Model/RegisterPhoneResponse.md)
 - [UpdateDeviceTokenRequest](docs/Model/UpdateDeviceTokenRequest.md)
 - [UpdateDeviceTokenResponse](docs/Model/UpdateDeviceTokenResponse.md)
 - [UpdateFileRequest](docs/Model/UpdateFileRequest.md)
 - [UpdateFileResponse](docs/Model/UpdateFileResponse.md)
 - [UpdateFolderRequest](docs/Model/UpdateFolderRequest.md)
 - [UpdateFolderResponse](docs/Model/UpdateFolderResponse.md)
 - [UpdateOrderRequest](docs/Model/UpdateOrderRequest.md)
 - [UpdateOrderRequestFolder](docs/Model/UpdateOrderRequestFolder.md)
 - [UpdateOrderResponse](docs/Model/UpdateOrderResponse.md)
 - [UpdateProfileImgRequest](docs/Model/UpdateProfileImgRequest.md)
 - [UpdateProfileImgResponse](docs/Model/UpdateProfileImgResponse.md)
 - [UpdateProfileRequest](docs/Model/UpdateProfileRequest.md)
 - [UpdateProfileRequestData](docs/Model/UpdateProfileRequestData.md)
 - [UpdateProfileResponse](docs/Model/UpdateProfileResponse.md)
 - [UpdateSettingsRequest](docs/Model/UpdateSettingsRequest.md)
 - [UpdateSettingsResponse](docs/Model/UpdateSettingsResponse.md)
 - [UpdateStarRequest](docs/Model/UpdateStarRequest.md)
 - [UpdateStarResponse](docs/Model/UpdateStarResponse.md)
 - [UpdateUserRequest](docs/Model/UpdateUserRequest.md)
 - [UpdateUserResponse](docs/Model/UpdateUserResponse.md)
 - [UploadMetaFileRequest](docs/Model/UploadMetaFileRequest.md)
 - [UploadMetaFileResponse](docs/Model/UploadMetaFileResponse.md)
 - [VerifyFolderPassRequest](docs/Model/VerifyFolderPassRequest.md)
 - [VerifyFolderPassResponse](docs/Model/VerifyFolderPassResponse.md)
 - [VerifyPhoneRequest](docs/Model/VerifyPhoneRequest.md)
 - [VerifyPhoneResponse](docs/Model/VerifyPhoneResponse.md)


## Documentation For Authorization

 All endpoints do not require authorization.


## Author




