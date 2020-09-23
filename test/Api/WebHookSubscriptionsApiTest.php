<?php

namespace SubscripcionSimulacionClientPhp\Client;

use \SubscripcionSimulacionClientPhp\Client\Configuration;
use \SubscripcionSimulacionClientPhp\Client\ApiException;
use \SubscripcionSimulacionClientPhp\Client\ObjectSerializer;

use \SubscripcionSimulacionClientPhp\Client\Api\WebHookSubscriptionsApi;
use \SubscripcionSimulacionClientPhp\Client\Model\Subscription;

class WebHookSubscriptionsApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $config = new Configuration();
        $config->setHost('the_url');
        $this->x_api_key = "your_api_key";
        $client = new \GuzzleHttp\Client();
        $this->apiInstance = new WebHookSubscriptionsApi($client,$config);
    }  

    public function testPostSubscription()
    {
        try {
            $enrollment = new Subscription();

            $enrollment->setEventType("mx.com.circulolaboral.employmentcheck");
            $enrollment->setWebHookUrl("your_url");
            $enrollment->setEnrollmentId($this->gen_uuid());


            $result = $this->apiInstance->postSubscription($this->x_api_key, $enrollment, null);
            print_r($result);
            
            if($result['subscription']!=null){
                //Get by subscription_id
                $this->getSubscriptions($result['subscription']['subscription_id']);

                //Delete by subscription_id
                $this->deleteSubscription($result['subscription']['subscription_id']);
            }
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling WebHookSubscriptionsApiTest->testPostSubscription: ', $e->getMessage(), PHP_EOL;
        }
    }


    public function testGetList(){
        try {
            $page = 1;
            $per_page = 5;
            $result = $this->apiInstance->getSubscriptions($this->x_api_key, $page, $per_page);
            print_r($result);
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling WebHookSubscriptionsApiTest->testGetList: ', $e->getMessage(), PHP_EOL;
        }
    }
    public function getSubscriptions($subscription_id)
    {
        try {
                $result = $this->apiInstance->getSubscription($this->x_api_key, $subscription_id);
                print_r($result);
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling WebHookSubscriptionsApiTest->getSubscriptions: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function deleteSubscription($subscription_id)
    {
        try {
            $result = $this->apiInstance->deleteSubscription($this->x_api_key, $subscription_id);
            print_r($result);
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling WebHookSubscriptionsApiTest->deleteSubscription: ', $e->getMessage(), PHP_EOL;
        }
    }

    private function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

}
