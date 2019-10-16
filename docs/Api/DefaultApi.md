# Call\Recorder\Client\DefaultApi

All URIs are relative to *https://app2.virtualbrix.net/rapi*

Method | HTTP request | Description
------------- | ------------- | -------------
[**buyCreditsPost**](DefaultApi.md#buyCreditsPost) | **POST** /buy_credits | 
[**cloneFilePost**](DefaultApi.md#cloneFilePost) | **POST** /clone_file | 
[**createFilePost**](DefaultApi.md#createFilePost) | **POST** /create_file | 
[**createFolderPost**](DefaultApi.md#createFolderPost) | **POST** /create_folder | 
[**deleteFilesPost**](DefaultApi.md#deleteFilesPost) | **POST** /delete_files | 
[**deleteFolderPost**](DefaultApi.md#deleteFolderPost) | **POST** /delete_folder | 
[**deleteMetaFilesPost**](DefaultApi.md#deleteMetaFilesPost) | **POST** /delete_meta_files | 
[**getFilesPost**](DefaultApi.md#getFilesPost) | **POST** /get_files | 
[**getFoldersPost**](DefaultApi.md#getFoldersPost) | **POST** /get_folders | 
[**getLanguagesPost**](DefaultApi.md#getLanguagesPost) | **POST** /get_languages | 
[**getMetaFilesPost**](DefaultApi.md#getMetaFilesPost) | **POST** /get_meta_files | 
[**getMsgsPost**](DefaultApi.md#getMsgsPost) | **POST** /get_msgs | 
[**getPhonesPost**](DefaultApi.md#getPhonesPost) | **POST** /get_phones | 
[**getProfilePost**](DefaultApi.md#getProfilePost) | **POST** /get_profile | 
[**getSettingsPost**](DefaultApi.md#getSettingsPost) | **POST** /get_settings | 
[**getTranslationsPost**](DefaultApi.md#getTranslationsPost) | **POST** /get_translations | 
[**notifyUserCustomPost**](DefaultApi.md#notifyUserCustomPost) | **POST** /notify_user_custom | 
[**recoverFilePost**](DefaultApi.md#recoverFilePost) | **POST** /recover_file | 
[**registerPhonePost**](DefaultApi.md#registerPhonePost) | **POST** /register_phone | 
[**updateDeviceTokenPost**](DefaultApi.md#updateDeviceTokenPost) | **POST** /update_device_token | 
[**updateFilePost**](DefaultApi.md#updateFilePost) | **POST** /update_file | 
[**updateFolderPost**](DefaultApi.md#updateFolderPost) | **POST** /update_folder | 
[**updateOrderPost**](DefaultApi.md#updateOrderPost) | **POST** /update_order | 
[**updateProfileImgPost**](DefaultApi.md#updateProfileImgPost) | **POST** /update_profile_img | 
[**updateProfilePost**](DefaultApi.md#updateProfilePost) | **POST** /update_profile | 
[**updateSettingsPost**](DefaultApi.md#updateSettingsPost) | **POST** /update_settings | 
[**updateStarPost**](DefaultApi.md#updateStarPost) | **POST** /update_star | 
[**updateUserPost**](DefaultApi.md#updateUserPost) | **POST** /update_user | 
[**uploadMetaFilePost**](DefaultApi.md#uploadMetaFilePost) | **POST** /upload_meta_file | 
[**verifyFolderPassPost**](DefaultApi.md#verifyFolderPassPost) | **POST** /verify_folder_pass | 
[**verifyPhonePost**](DefaultApi.md#verifyPhonePost) | **POST** /verify_phone | 


# **buyCreditsPost**
> \Call\Recorder\Client\Model\BuyCreditsResponse buyCreditsPost($api_key, $amount, $receipt, $product_id, $device_type)



Buy Credits

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$amount = 789; // int | 
$receipt = "receipt_example"; // string | 
$product_id = 789; // int | 
$device_type = new \Call\Recorder\Client\Model\DeviceType(); // \Call\Recorder\Client\Model\DeviceType | 

try {
    $result = $apiInstance->buyCreditsPost($api_key, $amount, $receipt, $product_id, $device_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->buyCreditsPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **amount** | **int**|  |
 **receipt** | **string**|  |
 **product_id** | **int**|  |
 **device_type** | [**\Call\Recorder\Client\Model\DeviceType**](../Model/.md)|  |

### Return type

[**\Call\Recorder\Client\Model\BuyCreditsResponse**](../Model/BuyCreditsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **cloneFilePost**
> \Call\Recorder\Client\Model\CloneFileResponse cloneFilePost($api_key, $id)



Clone File

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **id** | **int**|  |

### Return type

[**\Call\Recorder\Client\Model\CloneFileResponse**](../Model/CloneFileResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createFilePost**
> \Call\Recorder\Client\Model\CreateFileResponse createFilePost($api_key, $file, $data)



Create File

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$file = "file_example"; // string | 
$data = new \Call\Recorder\Client\Model\CreateFileData(); // \Call\Recorder\Client\Model\CreateFileData | 

try {
    $result = $apiInstance->createFilePost($api_key, $file, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->createFilePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **file** | **string****string**|  |
 **data** | [**\Call\Recorder\Client\Model\CreateFileData**](../Model/.md)|  |

### Return type

[**\Call\Recorder\Client\Model\CreateFileResponse**](../Model/CreateFileResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createFolderPost**
> \Call\Recorder\Client\Model\CreateFolderResponse createFolderPost($api_key, $name, $pass)



Create Folder

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **name** | **string**|  |
 **pass** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\CreateFolderResponse**](../Model/CreateFolderResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteFilesPost**
> \Call\Recorder\Client\Model\DeleteFilesResponse deleteFilesPost($api_key, $ids, $action)



Delete Files

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **ids** | [**int[]**](../Model/int.md)|  |
 **action** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\DeleteFilesResponse**](../Model/DeleteFilesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteFolderPost**
> \Call\Recorder\Client\Model\DeleteFolderResponse deleteFolderPost($api_key, $id, $move_to)



Delete Folder

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **id** | **int**|  |
 **move_to** | **int**|  |

### Return type

[**\Call\Recorder\Client\Model\DeleteFolderResponse**](../Model/DeleteFolderResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteMetaFilesPost**
> \Call\Recorder\Client\Model\DeleteMetaFilesResponse deleteMetaFilesPost($api_key, $ids, $parent_id)



Delete Meta Files

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **ids** | [**int[]**](../Model/int.md)|  |
 **parent_id** | **int**|  |

### Return type

[**\Call\Recorder\Client\Model\DeleteMetaFilesResponse**](../Model/DeleteMetaFilesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFilesPost**
> \Call\Recorder\Client\Model\GetFilesResponse getFilesPost($api_key, $page, $folder_id, $source, $pass, $reminder, $q, $id, $op)



Get Files

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **page** | **string**|  |
 **folder_id** | **int**|  |
 **source** | **string**|  |
 **pass** | **string**|  |
 **reminder** | **bool**|  |
 **q** | **string**|  |
 **id** | **int**|  |
 **op** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\GetFilesResponse**](../Model/GetFilesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFoldersPost**
> \Call\Recorder\Client\Model\GetFoldersResponse getFoldersPost($api_key)



Get Folders

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\GetFoldersResponse**](../Model/GetFoldersResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getLanguagesPost**
> \Call\Recorder\Client\Model\GetLanguagesResponse getLanguagesPost($api_key)



Get Languages

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\GetLanguagesResponse**](../Model/GetLanguagesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMetaFilesPost**
> \Call\Recorder\Client\Model\GetMetaFilesResponse getMetaFilesPost($api_key, $parent_id)



Get Meta File

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **parent_id** | **int**|  |

### Return type

[**\Call\Recorder\Client\Model\GetMetaFilesResponse**](../Model/GetMetaFilesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMsgsPost**
> \Call\Recorder\Client\Model\GetMessagesResponse getMsgsPost($api_key)



Get Messages

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\GetMessagesResponse**](../Model/GetMessagesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPhonesPost**
> \Call\Recorder\Client\Model\GetPhonesResponse getPhonesPost($api_key)



Get Phones

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\GetPhonesResponse**](../Model/GetPhonesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProfilePost**
> \Call\Recorder\Client\Model\GetProfileResponse getProfilePost($api_key)



Get Profile

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\GetProfileResponse**](../Model/GetProfileResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSettingsPost**
> \Call\Recorder\Client\Model\GetSettingsResponse getSettingsPost($api_key)



Get Settings

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\GetSettingsResponse**](../Model/GetSettingsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTranslationsPost**
> \Call\Recorder\Client\Model\GetTranslationsResponse getTranslationsPost($api_key, $language)



Get Translations

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **language** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\GetTranslationsResponse**](../Model/GetTranslationsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **notifyUserCustomPost**
> \Call\Recorder\Client\Model\NotifyUserResponse notifyUserCustomPost($api_key, $title, $body, $device_type)



Notify User

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$title = "title_example"; // string | 
$body = "body_example"; // string | 
$device_type = new \Call\Recorder\Client\Model\DeviceType(); // \Call\Recorder\Client\Model\DeviceType | 

try {
    $result = $apiInstance->notifyUserCustomPost($api_key, $title, $body, $device_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->notifyUserCustomPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **title** | **string**|  |
 **body** | **string**|  |
 **device_type** | [**\Call\Recorder\Client\Model\DeviceType**](../Model/.md)|  |

### Return type

[**\Call\Recorder\Client\Model\NotifyUserResponse**](../Model/NotifyUserResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **recoverFilePost**
> \Call\Recorder\Client\Model\RecoverFileResponse recoverFilePost($api_key, $id, $folder_id)



Recover File

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **id** | **int**|  |
 **folder_id** | **int**|  |

### Return type

[**\Call\Recorder\Client\Model\RecoverFileResponse**](../Model/RecoverFileResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **registerPhonePost**
> \Call\Recorder\Client\Model\RegisterPhoneResponse registerPhonePost($token, $phone)



Register Phone, Send phone number to server to get verification code

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token** | **string**|  |
 **phone** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\RegisterPhoneResponse**](../Model/RegisterPhoneResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateDeviceTokenPost**
> \Call\Recorder\Client\Model\UpdateDeviceTokenResponse updateDeviceTokenPost($api_key, $device_token, $device_type)



Update Device Token

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$device_token = "device_token_example"; // string | 
$device_type = new \Call\Recorder\Client\Model\DeviceType(); // \Call\Recorder\Client\Model\DeviceType | 

try {
    $result = $apiInstance->updateDeviceTokenPost($api_key, $device_token, $device_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateDeviceTokenPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **device_token** | **string**|  |
 **device_type** | [**\Call\Recorder\Client\Model\DeviceType**](../Model/.md)|  |

### Return type

[**\Call\Recorder\Client\Model\UpdateDeviceTokenResponse**](../Model/UpdateDeviceTokenResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateFilePost**
> \Call\Recorder\Client\Model\UpdateFileResponse updateFilePost($api_key, $id, $f_name, $l_name, $notes, $email, $phone, $tags, $folder_id, $name, $remind_days, $remind_date)



Update File

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **id** | **int**|  |
 **f_name** | **string**|  |
 **l_name** | **string**|  |
 **notes** | **string**|  |
 **email** | **string**|  |
 **phone** | **string**|  |
 **tags** | **string**|  |
 **folder_id** | **int**|  |
 **name** | **string**|  |
 **remind_days** | **string**|  |
 **remind_date** | **\DateTime**|  |

### Return type

[**\Call\Recorder\Client\Model\UpdateFileResponse**](../Model/UpdateFileResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateFolderPost**
> \Call\Recorder\Client\Model\UpdateFolderResponse updateFolderPost($api_key, $id, $name, $pass, $is_private)



Update Folder

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **id** | **int**|  |
 **name** | **string**|  |
 **pass** | **string**|  |
 **is_private** | **bool**|  |

### Return type

[**\Call\Recorder\Client\Model\UpdateFolderResponse**](../Model/UpdateFolderResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateOrderPost**
> \Call\Recorder\Client\Model\UpdateOrderResponse updateOrderPost($api_key, $folders)



Update Order

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$folders = array(new \Call\Recorder\Client\Model\UpdateOrderRequestFolder()); // \Call\Recorder\Client\Model\UpdateOrderRequestFolder[] | 

try {
    $result = $apiInstance->updateOrderPost($api_key, $folders);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateOrderPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **folders** | [**\Call\Recorder\Client\Model\UpdateOrderRequestFolder[]**](../Model/\Call\Recorder\Client\Model\UpdateOrderRequestFolder.md)|  |

### Return type

[**\Call\Recorder\Client\Model\UpdateOrderResponse**](../Model/UpdateOrderResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateProfileImgPost**
> \Call\Recorder\Client\Model\UpdateProfileImgResponse updateProfileImgPost($api_key, $file)



Update Profile Img

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **file** | **string****string**|  |

### Return type

[**\Call\Recorder\Client\Model\UpdateProfileImgResponse**](../Model/UpdateProfileImgResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateProfilePost**
> \Call\Recorder\Client\Model\UpdateProfileResponse updateProfilePost($api_key, $data)



Update Profile

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$data = new \Call\Recorder\Client\Model\UpdateProfileRequestData(); // \Call\Recorder\Client\Model\UpdateProfileRequestData | 

try {
    $result = $apiInstance->updateProfilePost($api_key, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateProfilePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **data** | [**\Call\Recorder\Client\Model\UpdateProfileRequestData**](../Model/.md)|  |

### Return type

[**\Call\Recorder\Client\Model\UpdateProfileResponse**](../Model/UpdateProfileResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateSettingsPost**
> \Call\Recorder\Client\Model\UpdateSettingsResponse updateSettingsPost($api_key, $play_beep, $files_permission)



Update Settings

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$play_beep = new \Call\Recorder\Client\Model\PlayBeep(); // \Call\Recorder\Client\Model\PlayBeep | 
$files_permission = new \Call\Recorder\Client\Model\FilesPermission(); // \Call\Recorder\Client\Model\FilesPermission | 

try {
    $result = $apiInstance->updateSettingsPost($api_key, $play_beep, $files_permission);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateSettingsPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **play_beep** | [**\Call\Recorder\Client\Model\PlayBeep**](../Model/.md)|  |
 **files_permission** | [**\Call\Recorder\Client\Model\FilesPermission**](../Model/.md)|  |

### Return type

[**\Call\Recorder\Client\Model\UpdateSettingsResponse**](../Model/UpdateSettingsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateStarPost**
> \Call\Recorder\Client\Model\UpdateStarResponse updateStarPost($api_key, $id, $star, $type)



Update Star

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **id** | **int**|  |
 **star** | **int**|  |
 **type** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\UpdateStarResponse**](../Model/UpdateStarResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateUserPost**
> \Call\Recorder\Client\Model\UpdateUserResponse updateUserPost($api_key, $app, $time_zone)



Update User

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$api_key = "api_key_example"; // string | 
$app = new \Call\Recorder\Client\Model\App(); // \Call\Recorder\Client\Model\App | 
$time_zone = "time_zone_example"; // string | 

try {
    $result = $apiInstance->updateUserPost($api_key, $app, $time_zone);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateUserPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **app** | [**\Call\Recorder\Client\Model\App**](../Model/.md)|  |
 **time_zone** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\UpdateUserResponse**](../Model/UpdateUserResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadMetaFilePost**
> \Call\Recorder\Client\Model\UploadMetaFileResponse uploadMetaFilePost($api_key, $file, $name, $parent_id, $id)



Upload Meta File

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **file** | **string****string**|  |
 **name** | **string**|  |
 **parent_id** | **int**|  |
 **id** | **int**|  |

### Return type

[**\Call\Recorder\Client\Model\UploadMetaFileResponse**](../Model/UploadMetaFileResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **verifyFolderPassPost**
> \Call\Recorder\Client\Model\VerifyFolderPassResponse verifyFolderPassPost($api_key, $id, $pass)



Verify Folder Pass

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**|  |
 **id** | **int**|  |
 **pass** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\VerifyFolderPassResponse**](../Model/VerifyFolderPassResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **verifyPhonePost**
> \Call\Recorder\Client\Model\VerifyPhoneResponse verifyPhonePost($token, $phone, $code, $mcc, $app, $device_token, $device_id, $device_type, $time_zone)



Send phone number and verification code to get API Key

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Call\Recorder\Client\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = "token_example"; // string | 
$phone = "phone_example"; // string | 
$code = "code_example"; // string | 
$mcc = "mcc_example"; // string | 
$app = new \Call\Recorder\Client\Model\App(); // \Call\Recorder\Client\Model\App | 
$device_token = "device_token_example"; // string | 
$device_id = "device_id_example"; // string | 
$device_type = new \Call\Recorder\Client\Model\DeviceType(); // \Call\Recorder\Client\Model\DeviceType | 
$time_zone = "time_zone_example"; // string | 

try {
    $result = $apiInstance->verifyPhonePost($token, $phone, $code, $mcc, $app, $device_token, $device_id, $device_type, $time_zone);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->verifyPhonePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token** | **string**|  |
 **phone** | **string**|  |
 **code** | **string**|  |
 **mcc** | **string**|  |
 **app** | [**\Call\Recorder\Client\Model\App**](../Model/.md)|  |
 **device_token** | **string**|  |
 **device_id** | **string**|  |
 **device_type** | [**\Call\Recorder\Client\Model\DeviceType**](../Model/.md)|  |
 **time_zone** | **string**|  |

### Return type

[**\Call\Recorder\Client\Model\VerifyPhoneResponse**](../Model/VerifyPhoneResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

