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
      "url": "https://github.com/novokrest/php-call-recorder-api.git"
    }
  ],
  "require": {
    "novokrest/php-call-recorder-api": "*@dev"
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

use Call\Recorder\Client\Api\DefaultApi;
use Call\Recorder\Client\Model\RegisterPhoneRequest;
use Call\Recorder\Client\Model\VerifyPhoneRequest;
use Call\Recorder\Client\Model\CreateFileRequest;

$api = new DefaultApi();
$registerPhonePostResponse = $api->registerPhone(
    (new RegisterPhoneRequest())
        ->setToken('55942ee3894f51000530894')
        ->setPhone('+16463742122')
);

$registerCode = $registerPhonePostResponse->getCode();
$verifyPhonePostResponse = $api->verifyPhone(
    (new VerifyPhoneRequest())
        ->setToken('55942ee3894f51000530894')
        ->setPhone('+16463742122')
        ->setCode($registerCode)
        ->setMcc('300')
        ->setApp('rec')
        ->setDeviceToken('871284c348e04a9cacab8aca6b2f3c9a')
        ->setDeviceId('871284c348e04a9cacab8aca6b2f3c9a')
        ->setDeviceType('ios')
        ->setTimeZone('10')
);

$apiKey = $verifyPhonePostResponse->getApiKey();
$createFilePostResponse = $api->createFile(
    (new CreateFileRequest())
        ->setApiKey($apiKey)
        ->setFile('test/Resources/audio.mp3')
        ->setData('')
);

$fileId = $createFilePostResponse->getId();
print $fileId;

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://app2.virtualbrix.net/rapi*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DefaultApi* | [**buyCredits**](docs/Api/DefaultApi.md#buycreditspost) | **POST** /buy_credits | 
*DefaultApi* | [**cloneFile**](docs/Api/DefaultApi.md#clonefilepost) | **POST** /clone_file | 
*DefaultApi* | [**createFile**](docs/Api/DefaultApi.md#createfilepost) | **POST** /create_file | 
*DefaultApi* | [**createFolder**](docs/Api/DefaultApi.md#createfolderpost) | **POST** /create_folder | 
*DefaultApi* | [**deleteFiles**](docs/Api/DefaultApi.md#deletefilespost) | **POST** /delete_files | 
*DefaultApi* | [**deleteFolder**](docs/Api/DefaultApi.md#deletefolderpost) | **POST** /delete_folder | 
*DefaultApi* | [**deleteMetaFiles**](docs/Api/DefaultApi.md#deletemetafilespost) | **POST** /delete_meta_files | 
*DefaultApi* | [**getFiles**](docs/Api/DefaultApi.md#getfilespost) | **POST** /get_files | 
*DefaultApi* | [**getFolders**](docs/Api/DefaultApi.md#getfolderspost) | **POST** /get_folders | 
*DefaultApi* | [**getLanguages**](docs/Api/DefaultApi.md#getlanguagespost) | **POST** /get_languages | 
*DefaultApi* | [**getMetaFiles**](docs/Api/DefaultApi.md#getmetafilespost) | **POST** /get_meta_files | 
*DefaultApi* | [**getMsgs**](docs/Api/DefaultApi.md#getmsgspost) | **POST** /get_msgs | 
*DefaultApi* | [**getPhones**](docs/Api/DefaultApi.md#getphonespost) | **POST** /get_phones | 
*DefaultApi* | [**getProfile**](docs/Api/DefaultApi.md#getprofilepost) | **POST** /get_profile | 
*DefaultApi* | [**getSettings**](docs/Api/DefaultApi.md#getsettingspost) | **POST** /get_settings | 
*DefaultApi* | [**getTranslations**](docs/Api/DefaultApi.md#gettranslationspost) | **POST** /get_translations | 
*DefaultApi* | [**notifyUserCustom**](docs/Api/DefaultApi.md#notifyusercustompost) | **POST** /notify_user_custom | 
*DefaultApi* | [**recoverFile**](docs/Api/DefaultApi.md#recoverfilepost) | **POST** /recover_file | 
*DefaultApi* | [**registerPhone**](docs/Api/DefaultApi.md#registerphonepost) | **POST** /register_phone | 
*DefaultApi* | [**updateDeviceToken**](docs/Api/DefaultApi.md#updatedevicetokenpost) | **POST** /update_device_token | 
*DefaultApi* | [**updateFile**](docs/Api/DefaultApi.md#updatefilepost) | **POST** /update_file | 
*DefaultApi* | [**updateFolder**](docs/Api/DefaultApi.md#updatefolderpost) | **POST** /update_folder | 
*DefaultApi* | [**updateOrder**](docs/Api/DefaultApi.md#updateorderpost) | **POST** /update_order | 
*DefaultApi* | [**updateProfileImg**](docs/Api/DefaultApi.md#updateprofileimgpost) | **POST** /update_profile_img | 
*DefaultApi* | [**updateProfile**](docs/Api/DefaultApi.md#updateprofilepost) | **POST** /update_profile | 
*DefaultApi* | [**updateSettings**](docs/Api/DefaultApi.md#updatesettingspost) | **POST** /update_settings | 
*DefaultApi* | [**updateStar**](docs/Api/DefaultApi.md#updatestarpost) | **POST** /update_star | 
*DefaultApi* | [**updateUser**](docs/Api/DefaultApi.md#updateuserpost) | **POST** /update_user | 
*DefaultApi* | [**uploadMetaFile**](docs/Api/DefaultApi.md#uploadmetafilepost) | **POST** /upload_meta_file | 
*DefaultApi* | [**verifyFolderPass**](docs/Api/DefaultApi.md#verifyfolderpasspost) | **POST** /verify_folder_pass | 
*DefaultApi* | [**verifyPhone**](docs/Api/DefaultApi.md#verifyphonepost) | **POST** /verify_phone | 


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




