<?php
namespace wodrow\yii2wlog;


use wodrow\yii2wlog\models\WwReqLog;
use wodrow\yii2wtools\tools\Model;
use yii\base\Component;
use yii\db\Exception;

class Wlog extends Component
{
    public $app_id;

    /**
     * @var WwReqLog
     */
    private $_req_log;

    public function init()
    {
        parent::init();
        if (!$this->app_id){
            $this->app_id = \Yii::$app->id;
        }
        $this->_req_log = new WwReqLog();
        $this->_req_log->app_id = $this->app_id;
        $this->_req_log->created_at = time();
        if (\Yii::$app instanceof \yii\web\Application){
            $this->saveWebAppReq();
        }
    }

    public function saveWebAppReq()
    {
        $this->_req_log->from_ip = \Yii::$app->request->userIP;
        $this->_req_log->get = \Yii::$app->request->get();
        $this->_req_log->post = \Yii::$app->request->post();
        $this->_req_log->raw_body = \Yii::$app->request->rawBody;
        $this->_req_log->files = $_FILES;
        $this->_req_log->all_data = [
            '$_SERVER' => $_SERVER,
            '$_REQUET' => $_REQUEST,
            '$_ENV' => $_ENV,
        ];
        \Yii::$app->on(\Yii::$app::EVENT_AFTER_ACTION, function (){
            $this->_req_log->route = \Yii::$app->controller->route;
            $this->saveReq();
        });
    }

    public function saveReq()
    {
        $this->_req_log->get = json_encode($this->_req_log->get, JSON_UNESCAPED_UNICODE);
        $this->_req_log->post = json_encode($this->_req_log->post, JSON_UNESCAPED_UNICODE);
        $this->_req_log->files = json_encode($this->_req_log->files, JSON_UNESCAPED_UNICODE);
        $this->_req_log->all_data = json_encode($this->_req_log->all_data, JSON_UNESCAPED_UNICODE);
        if (!$this->_req_log->save()){
            throw new Exception(Model::getModelError($this->_req_log));
        }
//        echo "<pre>";
//        var_dump($this->_req_log->toArray());
//        var_dump(\Yii::$app->request->userIP);
//        var_dump(\Yii::$app->request->get());
//        var_dump(\Yii::$app->request->post());
//        var_dump(\Yii::$app->request->rawBody);
//        var_dump($_FILES);
//        var_dump($_SERVER);
//        var_dump($_REQUEST);
//        var_dump($_ENV);
//        var_dump($_COOKIE);
//        var_dump($_SESSION);
//        exit;
    }
}