<?php
/**
 * DefaultApiTest
 * PHP version 7
 *
 * @category Class
 * @package  Call\Recorder\Client
 * @author   Konstantin Novokreshchenov
 */

/**
 * Call Recorder API
 *
 * Call Recorder API
 *
 * OpenAPI spec version: 1.0.0
 */


namespace Call\Recorder\Client;

use \Call\Recorder\Client\Api\DefaultApi;
use \Call\Recorder\Client\Model\App;
use \Call\Recorder\Client\Model\BuyCreditsRequest;
use \Call\Recorder\Client\Model\BuyCreditsResponse;
use \Call\Recorder\Client\Model\CloneFileRequest;
use \Call\Recorder\Client\Model\CloneFileResponse;
use \Call\Recorder\Client\Model\CreateFileData;
use \Call\Recorder\Client\Model\CreateFileRequest;
use \Call\Recorder\Client\Model\CreateFileResponse;
use \Call\Recorder\Client\Model\CreateFolderRequest;
use \Call\Recorder\Client\Model\CreateFolderResponse;
use \Call\Recorder\Client\Model\DeleteFilesRequest;
use \Call\Recorder\Client\Model\DeleteFilesResponse;
use \Call\Recorder\Client\Model\DeleteFolderRequest;
use \Call\Recorder\Client\Model\DeleteFolderResponse;
use \Call\Recorder\Client\Model\DeleteMetaFilesRequest;
use \Call\Recorder\Client\Model\DeleteMetaFilesResponse;
use \Call\Recorder\Client\Model\DeviceType;
use \Call\Recorder\Client\Model\FilesPermission;
use \Call\Recorder\Client\Model\GetFilesRequest;
use \Call\Recorder\Client\Model\GetFilesResponse;
use \Call\Recorder\Client\Model\GetFilesResponseFile;
use \Call\Recorder\Client\Model\GetFoldersRequest;
use \Call\Recorder\Client\Model\GetFoldersResponse;
use \Call\Recorder\Client\Model\GetFoldersResponseFolder;
use \Call\Recorder\Client\Model\GetLanguagesRequest;
use \Call\Recorder\Client\Model\GetLanguagesResponse;
use \Call\Recorder\Client\Model\GetMessagesRequest;
use \Call\Recorder\Client\Model\GetMessagesResponse;
use \Call\Recorder\Client\Model\GetMessagesResponseMsg;
use \Call\Recorder\Client\Model\GetMetaFilesRequest;
use \Call\Recorder\Client\Model\GetMetaFilesResponse;
use \Call\Recorder\Client\Model\GetMetaFilesResponseMetaFiles;
use \Call\Recorder\Client\Model\GetPhonesRequest;
use \Call\Recorder\Client\Model\GetPhonesResponse;
use \Call\Recorder\Client\Model\GetPhonesResponsePhone;
use \Call\Recorder\Client\Model\GetProfileRequest;
use \Call\Recorder\Client\Model\GetProfileResponse;
use \Call\Recorder\Client\Model\GetProfileResponseProfile;
use \Call\Recorder\Client\Model\GetSettingsRequest;
use \Call\Recorder\Client\Model\GetSettingsResponse;
use \Call\Recorder\Client\Model\GetSettingsResponseSettings;
use \Call\Recorder\Client\Model\GetTranslationsRequest;
use \Call\Recorder\Client\Model\GetTranslationsResponse;
use \Call\Recorder\Client\Model\Language;
use \Call\Recorder\Client\Model\NotifyUserRequest;
use \Call\Recorder\Client\Model\NotifyUserResponse;
use \Call\Recorder\Client\Model\PlayBeep;
use \Call\Recorder\Client\Model\RecoverFileRequest;
use \Call\Recorder\Client\Model\RecoverFileResponse;
use \Call\Recorder\Client\Model\RegisterPhoneRequest;
use \Call\Recorder\Client\Model\RegisterPhoneResponse;
use \Call\Recorder\Client\Model\UpdateDeviceTokenRequest;
use \Call\Recorder\Client\Model\UpdateDeviceTokenResponse;
use \Call\Recorder\Client\Model\UpdateFileRequest;
use \Call\Recorder\Client\Model\UpdateFileResponse;
use \Call\Recorder\Client\Model\UpdateFolderRequest;
use \Call\Recorder\Client\Model\UpdateFolderResponse;
use \Call\Recorder\Client\Model\UpdateOrderRequest;
use \Call\Recorder\Client\Model\UpdateOrderRequestFolder;
use \Call\Recorder\Client\Model\UpdateOrderResponse;
use \Call\Recorder\Client\Model\UpdateProfileImgRequest;
use \Call\Recorder\Client\Model\UpdateProfileImgResponse;
use \Call\Recorder\Client\Model\UpdateProfileRequest;
use \Call\Recorder\Client\Model\UpdateProfileRequestData;
use \Call\Recorder\Client\Model\UpdateProfileResponse;
use \Call\Recorder\Client\Model\UpdateSettingsRequest;
use \Call\Recorder\Client\Model\UpdateSettingsResponse;
use \Call\Recorder\Client\Model\UpdateStarRequest;
use \Call\Recorder\Client\Model\UpdateStarResponse;
use \Call\Recorder\Client\Model\UpdateUserRequest;
use \Call\Recorder\Client\Model\UpdateUserResponse;
use \Call\Recorder\Client\Model\UploadMetaFileRequest;
use \Call\Recorder\Client\Model\UploadMetaFileResponse;
use \Call\Recorder\Client\Model\VerifyFolderPassRequest;
use \Call\Recorder\Client\Model\VerifyFolderPassResponse;
use \Call\Recorder\Client\Model\VerifyPhoneRequest;
use \Call\Recorder\Client\Model\VerifyPhoneResponse;
use \Call\Recorder\Client\Configuration;
use \Call\Recorder\Client\ApiException;
use \Call\Recorder\Client\ObjectSerializer;

/**
 * DefaultApiTest Class Doc Comment
 *
 * @category Class
 * @package  Call\Recorder\Client
 */
class DefaultApiTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test case for buyCreditsPost
     */
	public function testBuyCredits()
	{
		print 'Run test for #buyCredits...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->buyCredits(
				(new BuyCreditsRequest())
					->setApiKey($apiKey)
					->setAmount(100)
					->setReceipt('test')
					->setProductId(1)
					->setDeviceType('ios')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		print('');
	}


    /**
     * Test case for cloneFilePost
     */
	public function testCloneFile()
	{
		print 'Run test for #cloneFile...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFileId($api, function ($api, $apiKey, $fileId) {
			return $api->cloneFile(
				(new CloneFileRequest())
					->setApiKey($apiKey)
					->setId($fileId)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		$this->assertEquals('file_cloned', $response->getCode());
		$this->assertGreaterThan(0, $response->getId());
		print('');
	}


    /**
     * Test case for createFilePost
     */
	public function testCreateFile()
	{
		print 'Run test for #createFile...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->createFile(
				(new CreateFileRequest())
					->setApiKey($apiKey)
					->setFile('test/Resources/audio.mp3')
					->setData((new CreateFileData())
						->setName('test-file')
						->setEmail('e@mail.com')
						->setPhone('+16463742122')
						->setLName('l')
						->setFName('f')
						->setNotes('n')
						->setTags('t')
						->setSource('0')
						->setRemindDays('10')
						->setRemindDate('2019-09-03T21:11:51.824121+03:00'))
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertGreaterThan(0, $response->getId());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		print('');
	}


    /**
     * Test case for createFolderPost
     */
	public function testCreateFolder()
	{
		print 'Run test for #createFolder...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->createFolder(
				(new CreateFolderRequest())
					->setApiKey($apiKey)
					->setName('test-folder')
					->setPass('12345')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		$this->assertGreaterThan(0, $response->getId());
		$this->assertEquals('folder_created', $response->getCode());
		print('');
	}


    /**
     * Test case for deleteFilesPost
     */
	public function testDeleteFiles()
	{
		print 'Run test for #deleteFiles...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFileId($api, function ($api, $apiKey, $fileId) {
			return $api->deleteFiles(
				(new DeleteFilesRequest())
					->setApiKey($apiKey)
					->setIds([$fileId])
					->setAction('remove_forever')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		print('');
	}


    /**
     * Test case for deleteFolderPost
     */
	public function testDeleteFolder()
	{
		print 'Run test for #deleteFolder...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFolderId($api, function ($api, $apiKey, $folderId) {
			return $api->deleteFolder(
				(new DeleteFolderRequest())
					->setApiKey($apiKey)
					->setId($folderId)
					->setMoveTo('')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		print('');
	}


    /**
     * Test case for deleteMetaFilesPost
     */
	public function testDeleteMetaFiles()
	{
		print 'Run test for #deleteMetaFiles...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFileIdAndMetaFileId($api, function ($api, $apiKey, $fileId, $metaFileId) {
			return $api->deleteMetaFiles(
				(new DeleteMetaFilesRequest())
					->setApiKey($apiKey)
					->setIds([$metaFileId])
					->setParentId($fileId)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		print('');
	}


    /**
     * Test case for getFilesPost
     */
	public function testGetFiles()
	{
		print 'Run test for #getFiles...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->getFiles(
				(new GetFilesRequest())
					->setApiKey($apiKey)
					->setPage(0)
					->setFolderId(0)
					->setSource('all')
					->setPass('12345')
					->setReminder(false)
					->setQ('hello')
					->setId(0)
					->setOp('greater')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertEquals(0, $response->getCredits());
		$this->assertEquals(0, $response->getCreditsTrans());
		$this->assertEmpty($response->getFiles());
		print('');
	}


    /**
     * Test case for getFoldersPost
     */
	public function testGetFolders()
	{
		print 'Run test for #getFolders...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->getFolders(
				(new GetFoldersRequest())
					->setApiKey($apiKey)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		$this->assertNotEmpty($response->getFolders());
		print('');
	}


    /**
     * Test case for getLanguagesPost
     */
	public function testGetLanguages()
	{
		print 'Run test for #getLanguages...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->getLanguages(
				(new GetLanguagesRequest())
					->setApiKey($apiKey)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertNotNull($response->getLanguages());
		print('');
	}


    /**
     * Test case for getMetaFilesPost
     */
	public function testGetMetaFiles()
	{
		print 'Run test for #getMetaFiles...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFileId($api, function ($api, $apiKey, $fileId) {
			return $api->getMetaFiles(
				(new GetMetaFilesRequest())
					->setApiKey($apiKey)
					->setParentId($fileId)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertNotNull($response->getMetaFiles());
		print('');
	}


    /**
     * Test case for getMsgsPost
     */
	public function testGetMsgs()
	{
		print 'Run test for #getMsgs...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->getMsgs(
				(new GetMessagesRequest())
					->setApiKey($apiKey)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertNotNull($response->getMsgs());
		print('');
	}


    /**
     * Test case for getPhonesPost
     */
	public function testGetPhones()
	{
		print 'Run test for #getPhones...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->getPhones(
				(new GetPhonesRequest())
					->setApiKey($apiKey)
			);
		});
		print('');
	}


    /**
     * Test case for getProfilePost
     */
	public function testGetProfile()
	{
		print 'Run test for #getProfile...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->getProfile(
				(new GetProfileRequest())
					->setApiKey($apiKey)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertNotEmpty($response->getCode());
		$this->assertNotNull($response->getProfile());
		$this->assertNotNull($response->getApp());
		$this->assertNotNull($response->getShareUrl());
		$this->assertNotNull($response->getRateUrl());
		$this->assertEquals(0, $response->getCredits());
		$this->assertEquals(0, $response->getCreditsTrans());
		print('');
	}


    /**
     * Test case for getSettingsPost
     */
	public function testGetSettings()
	{
		print 'Run test for #getSettings...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->getSettings(
				(new GetSettingsRequest())
					->setApiKey($apiKey)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertNotNull($response->getApp());
		$this->assertEquals(0, $response->getCredits());
		$this->assertNotNull($response->getSettings());
		print('');
	}


    /**
     * Test case for getTranslationsPost
     */
	public function testGetTranslations()
	{
		print 'Run test for #getTranslations...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->getTranslations(
				(new GetTranslationsRequest())
					->setApiKey($apiKey)
					->setLanguage('en_US')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertNotNull($response->getTranslation());
		print('');
	}


    /**
     * Test case for notifyUserCustomPost
     */
	public function testNotifyUserCustom()
	{
		print 'Run test for #notifyUserCustom...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->notifyUserCustom(
				(new NotifyUserRequest())
					->setApiKey($apiKey)
					->setTitle('test-title')
					->setBody('test-body')
					->setDeviceType('ios')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		print('');
	}


    /**
     * Test case for recoverFilePost
     */
	public function testRecoverFile()
	{
		print 'Run test for #recoverFile...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFileId($api, function ($api, $apiKey, $fileId) {
			return $api->recoverFile(
				(new RecoverFileRequest())
					->setApiKey($apiKey)
					->setId($fileId)
					->setFolderId(0)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		$this->assertNotEmpty($response->getCode());
		print('');
	}


    /**
     * Test case for registerPhonePost
     */
	public function testRegisterPhone()
	{
		print 'Run test for #registerPhone...';
		$api = new DefaultApi();
		$response = $api->registerPhone(
			(new RegisterPhoneRequest())
				->setToken('55942ee3894f51000530894')
				->setPhone('+16463742122')
		);
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertNotNull($response->getPhone());
		$this->assertNotEmpty($response->getCode());
		$this->assertStringMatchesFormat('Verification Code Sent', $response->getMsg());
		print('');
	}


    /**
     * Test case for updateDeviceTokenPost
     */
	public function testUpdateDeviceToken()
	{
		print 'Run test for #updateDeviceToken...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->updateDeviceToken(
				(new UpdateDeviceTokenRequest())
					->setApiKey($apiKey)
					->setDeviceToken('871284c348e04a9cacab8aca6b2f3c9a')
					->setDeviceType('ios')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		print('');
	}


    /**
     * Test case for updateFilePost
     */
	public function testUpdateFile()
	{
		print 'Run test for #updateFile...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFileId($api, function ($api, $apiKey, $fileId) {
			return $api->updateFile(
				(new UpdateFileRequest())
					->setApiKey($apiKey)
					->setId($fileId)
					->setFName('f')
					->setLName('l')
					->setNotes('n')
					->setEmail('e@mail.ru')
					->setPhone('+16463742122')
					->setTags('t')
					->setFolderId(0)
					->setName('n')
					->setRemindDays('10')
					->setRemindDate('2019-09-03T21:11:51.824121+03:00')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		print('');
	}


    /**
     * Test case for updateFolderPost
     */
	public function testUpdateFolder()
	{
		print 'Run test for #updateFolder...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFolderId($api, function ($api, $apiKey, $folderId) {
			return $api->updateFolder(
				(new UpdateFolderRequest())
					->setApiKey($apiKey)
					->setId($folderId)
					->setName('n')
					->setPass('12345')
					->setIsPrivate(true)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('Folder Updated', $response->getMsg());
		$this->assertNotEmpty($response->getCode());
		print('');
	}


    /**
     * Test case for updateOrderPost
     */
	public function testUpdateOrder()
	{
		print 'Run test for #updateOrder...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->updateOrder(
				(new UpdateOrderRequest())
					->setApiKey($apiKey)
					->setFolders(array(0))
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('Order Updated', $response->getMsg());
		$this->assertNotEmpty($response->getCode());
		print('');
	}


    /**
     * Test case for updateProfileImgPost
     */
	public function testUpdateProfileImg()
	{
		print 'Run test for #updateProfileImg...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->updateProfileImg(
				(new UpdateProfileImgRequest())
					->setApiKey($apiKey)
					->setFile('test/Resources/java.png')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('Profile Picture Updated', $response->getMsg());
		$this->assertNotEmpty($response->getCode());
		$this->assertNotNull($response->getFile());
		$this->assertNotNull($response->getPath());
		print('');
	}


    /**
     * Test case for updateProfilePost
     */
	public function testUpdateProfile()
	{
		print 'Run test for #updateProfile...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->updateProfile(
				(new UpdateProfileRequest())
					->setApiKey($apiKey)
					->setData((new UpdateProfileRequestData())
						->setFName('f')
						->setLName('l')
						->setEmail('e@mail.ru')
						->setIsPublic('')
						->setLanguage(''))
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('Profile Updated', $response->getMsg());
		$this->assertNotEmpty($response->getCode());
		print('');
	}


    /**
     * Test case for updateSettingsPost
     */
	public function testUpdateSettings()
	{
		print 'Run test for #updateSettings...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->updateSettings(
				(new UpdateSettingsRequest())
					->setApiKey($apiKey)
					->setPlayBeep('no')
					->setFilesPermission('private')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		$this->assertNotEmpty($response->getCode());
		print('');
	}


    /**
     * Test case for updateStarPost
     */
	public function testUpdateStar()
	{
		print 'Run test for #updateStar...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFileId($api, function ($api, $apiKey, $fileId) {
			return $api->updateStar(
				(new UpdateStarRequest())
					->setApiKey($apiKey)
					->setId($fileId)
					->setStar(true)
					->setType('file')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		$this->assertNotEmpty($response->getCode());
		print('');
	}


    /**
     * Test case for updateUserPost
     */
	public function testUpdateUser()
	{
		print 'Run test for #updateUser...';
		$api = new DefaultApi();
		$response = $this->provideApiKey($api, function ($api, $apiKey) {
			return $api->updateUser(
				(new UpdateUserRequest())
					->setApiKey($apiKey)
					->setApp('rec')
					->setTimeZone('10')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		$this->assertNotEmpty($response->getCode());
		print('');
	}


    /**
     * Test case for uploadMetaFilePost
     */
	public function testUploadMetaFile()
	{
		print 'Run test for #uploadMetaFile...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFileId($api, function ($api, $apiKey, $fileId) {
			return $api->uploadMetaFile(
				(new UploadMetaFileRequest())
					->setApiKey($apiKey)
					->setFile('test/Resources/java.png')
					->setName('test-meta')
					->setParentId($fileId)
					->setId(1)
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('%Ssuccess%S', strtolower($response->getMsg()));
		$this->assertEquals($fileId, $response->getParentId());
		$this->assertGreaterThan(0, $response->getId());
		print('');
	}


    /**
     * Test case for verifyFolderPassPost
     */
	public function testVerifyFolderPass()
	{
		print 'Run test for #verifyFolderPass...';
		$api = new DefaultApi();
		$response = $this->provideApiKeyAndFolderId($api, function ($api, $apiKey, $folderId) {
			return $api->verifyFolderPass(
				(new VerifyFolderPassRequest())
					->setApiKey($apiKey)
					->setId($folderId)
					->setPass('12345')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertStringMatchesFormat('Password is Correct', $response->getMsg());
		$this->assertNotEmpty($response->getCode());
		print('');
	}


    /**
     * Test case for verifyPhonePost
     */
	public function testVerifyPhone()
	{
		print 'Run test for #verifyPhone...';
		$api = new DefaultApi();
		$response = $this->provideCode($api, function ($api, $code) {
			return $api->verifyPhone(
				(new VerifyPhoneRequest())
					->setToken('55942ee3894f51000530894')
					->setPhone('+16463742122')
					->setCode($code)
					->setMcc('300')
					->setApp('rec')
					->setDeviceToken('871284c348e04a9cacab8aca6b2f3c9a')
					->setDeviceId('871284c348e04a9cacab8aca6b2f3c9a')
					->setDeviceType('ios')
					->setTimeZone('10')
			);
		});
		print($response);
		$this->assertEquals('ok', $response->getStatus());
		$this->assertNotNull($response->getPhone());
		$this->assertNotNull($response->getApiKey());
		$this->assertStringMatchesFormat('Phone Verified', $response->getMsg());
		print('');
	}



	public function provideCode($api, $callback)
	{
		$registerPhonePostResponse = $api->registerPhone(
			(new RegisterPhoneRequest())
				->setToken('55942ee3894f51000530894')
				->setPhone('+16463742122')
		);
		$registerPhonePostResponseCode = $registerPhonePostResponse->getCode();
		$code = $registerPhonePostResponseCode;
		return $callback($api, $code);
	}


	public function provideApiKey($api, $callback)
	{
		$registerPhonePostResponse = $api->registerPhone(
			(new RegisterPhoneRequest())
				->setToken('55942ee3894f51000530894')
				->setPhone('+16463742122')
		);
		$registerPhonePostResponseCode = $registerPhonePostResponse->getCode();
		$verifyPhonePostResponse = $api->verifyPhone(
			(new VerifyPhoneRequest())
				->setToken('55942ee3894f51000530894')
				->setPhone('+16463742122')
				->setCode($registerPhonePostResponseCode)
				->setMcc('300')
				->setApp('rec')
				->setDeviceToken('871284c348e04a9cacab8aca6b2f3c9a')
				->setDeviceId('871284c348e04a9cacab8aca6b2f3c9a')
				->setDeviceType('ios')
				->setTimeZone('10')
		);
		$verifyPhonePostResponseApiKey = $verifyPhonePostResponse->getApiKey();
		$apiKey = $verifyPhonePostResponseApiKey;
		return $callback($api, $apiKey);
	}


	public function provideApiKeyAndFileId($api, $callback)
	{
		$registerPhonePostResponse = $api->registerPhone(
			(new RegisterPhoneRequest())
				->setToken('55942ee3894f51000530894')
				->setPhone('+16463742122')
		);
		$registerPhonePostResponseCode = $registerPhonePostResponse->getCode();
		$verifyPhonePostResponse = $api->verifyPhone(
			(new VerifyPhoneRequest())
				->setToken('55942ee3894f51000530894')
				->setPhone('+16463742122')
				->setCode($registerPhonePostResponseCode)
				->setMcc('300')
				->setApp('rec')
				->setDeviceToken('871284c348e04a9cacab8aca6b2f3c9a')
				->setDeviceId('871284c348e04a9cacab8aca6b2f3c9a')
				->setDeviceType('ios')
				->setTimeZone('10')
		);
		$verifyPhonePostResponseApiKey = $verifyPhonePostResponse->getApiKey();
		$createFilePostResponse = $api->createFile(
			(new CreateFileRequest())
				->setApiKey($verifyPhonePostResponseApiKey)
				->setFile('test/Resources/audio.mp3')
				->setData('')
		);
		$createFilePostResponseId = $createFilePostResponse->getId();
		$apiKey = $verifyPhonePostResponseApiKey;
		$fileId = $createFilePostResponseId;
		return $callback($api, $apiKey, $fileId);
	}


	public function provideApiKeyAndFolderId($api, $callback)
	{
		$registerPhonePostResponse = $api->registerPhone(
			(new RegisterPhoneRequest())
				->setToken('55942ee3894f51000530894')
				->setPhone('+16463742122')
		);
		$registerPhonePostResponseCode = $registerPhonePostResponse->getCode();
		$verifyPhonePostResponse = $api->verifyPhone(
			(new VerifyPhoneRequest())
				->setToken('55942ee3894f51000530894')
				->setPhone('+16463742122')
				->setCode($registerPhonePostResponseCode)
				->setMcc('300')
				->setApp('rec')
				->setDeviceToken('871284c348e04a9cacab8aca6b2f3c9a')
				->setDeviceId('871284c348e04a9cacab8aca6b2f3c9a')
				->setDeviceType('ios')
				->setTimeZone('10')
		);
		$verifyPhonePostResponseApiKey = $verifyPhonePostResponse->getApiKey();
		$createFolderPostResponse = $api->createFolder(
			(new CreateFolderRequest())
				->setApiKey($verifyPhonePostResponseApiKey)
				->setName('test-folder')
				->setPass('12345')
		);
		$createFolderPostResponseId = $createFolderPostResponse->getId();
		$apiKey = $verifyPhonePostResponseApiKey;
		$folderId = $createFolderPostResponseId;
		return $callback($api, $apiKey, $folderId);
	}


	public function provideApiKeyAndFileIdAndMetaFileId($api, $callback)
	{
		$registerPhonePostResponse = $api->registerPhone(
			(new RegisterPhoneRequest())
				->setToken('55942ee3894f51000530894')
				->setPhone('+16463742122')
		);
		$registerPhonePostResponseCode = $registerPhonePostResponse->getCode();
		$verifyPhonePostResponse = $api->verifyPhone(
			(new VerifyPhoneRequest())
				->setToken('55942ee3894f51000530894')
				->setPhone('+16463742122')
				->setCode($registerPhonePostResponseCode)
				->setMcc('300')
				->setApp('rec')
				->setDeviceToken('871284c348e04a9cacab8aca6b2f3c9a')
				->setDeviceId('871284c348e04a9cacab8aca6b2f3c9a')
				->setDeviceType('ios')
				->setTimeZone('10')
		);
		$verifyPhonePostResponseApiKey = $verifyPhonePostResponse->getApiKey();
		$createFilePostResponse = $api->createFile(
			(new CreateFileRequest())
				->setApiKey($verifyPhonePostResponseApiKey)
				->setFile('test/Resources/audio.mp3')
				->setData('')
		);
		$createFilePostResponseId = $createFilePostResponse->getId();
		$uploadMetaFilePostResponse = $api->uploadMetaFile(
			(new UploadMetaFileRequest())
				->setApiKey($verifyPhonePostResponseApiKey)
				->setFile('test/Resources/java.png')
				->setName('test-meta')
				->setParentId($createFilePostResponseId)
				->setId(1)
		);
		$uploadMetaFilePostResponseId = $uploadMetaFilePostResponse->getId();
		$apiKey = $verifyPhonePostResponseApiKey;
		$fileId = $createFilePostResponseId;
		$metaFileId = $uploadMetaFilePostResponseId;
		return $callback($api, $apiKey, $fileId, $metaFileId);
	}



}

