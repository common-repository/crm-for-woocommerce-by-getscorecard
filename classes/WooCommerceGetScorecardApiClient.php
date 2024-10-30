<?php
/**
 * Created by PhpStorm.
 * User: Antonshell
 * Date: 04.03.2015
 * Time: 11:21
 */

/**
 * Class GetScorecardApiClient
 */
class WooCommerceGetScorecardApiClient extends WooCommerceGetScorecardApi{
    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id){
        $userInfo = $this->sendGetRequest('users/' . (int)$id);
        $userInfo = json_decode($userInfo,true);
        return $userInfo[0];
    }

    /**
     * @param $data
     */
    public function sendWebHook($data){
        $result = $this->sendPostRequest($data,'woocommerce/processWebhook');
    }

    public function importData($data){
        $result = $this->sendPostRequest($data,'woocommerce/importData');
    }

    /**
     * @param $data
     * @param $module
     * @return array
     */
    protected function processResultGet($data,$module){
        $result = array();

        if(is_array($data['_embedded']['columns'])){

            if($module){
                $result['data'] = array();

                foreach($data['_embedded']['columns'] as $key=>$item){
                    if($item['moduleid'] == $module){
                        $result['data'][] = $item;
                    }
                }
            }

            $result['statusCode'] = 200;
            $result['statusText'] = 'mail_sent';
            $result['message'] = 'mail_sent_ok';
        }
        else{
            $result = [
                'statusCode' => 400,
                'statusText' => 'error',
                'message' => 'can\'t get data'
            ];
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getUserInfoLabels(){
        return array(
            'id' => 'GetScorecard ID',
            'fullname' => 'Full Name',
            'email' => 'Email'
        );
    }

    /**
     * @param $result
     * @return array
     */
    protected function processResultPost($result){
        $response = [
            'statusCode' => 400,
            'statusText' => 'mail_failed',
            'message' => 'access_token_not_exist'
        ];

        if(!isset($result->status)){
            $response['statusCode'] = 200;
            $response['statusText'] = 'mail_sent';
            $response['message'] = 'mail_sent_ok';
        }
        elseif($result->status == 422){
            $invalid_fields = array();

            foreach($result->validation_messages as $key => $value) {
                $invalid_fields[$key] = [
                    'reason' => '',
                    'idref' => ''
                ];

                foreach($value as $errorMessage) {
                    $invalid_fields[$key]['reason'] .= $errorMessage;
                }
            }

            $response['statusCode'] = 422;
            $response['statusText'] = 'validation_failed';
            $response['message'] = 'validation_error';
            $response['invalid_fields'] = $invalid_fields;
        }
        elseif($result->status == 403){
            $response['statusCode'] = 403;
            $response['statusText'] = 'mail_failed';
            $response['message'] = 'api_access_denied';
        }

        return $response;
    }
}