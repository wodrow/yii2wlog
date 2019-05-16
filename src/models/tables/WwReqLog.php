<?php
namespace wodrow\yii2wlog\models\tables;


use Yii;

/**
 * This is the model class for table "{{%ww_req_log}}".
 *
 * @property string $id
 * @property string $app_id
 * @property int $created_at
 * @property string $route
 * @property string $from_ip
 * @property string $get
 * @property string $post
 * @property string $raw_body
 * @property string $files
 * @property string $all_data
 */
class WwReqLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ww_req_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_id', 'created_at', 'route'], 'required'],
            [['created_at'], 'integer'],
            [['from_ip', 'get', 'post', 'raw_body', 'files', 'all_data'], 'default'],
            [['get', 'post', 'raw_body', 'files', 'all_data'], 'string'],
            [['app_id', 'route'], 'string', 'max' => 150],
            [['from_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'app_id' => Yii::t('app', 'App ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'route' => Yii::t('app', 'Route'),
            'from_ip' => Yii::t('app', 'From Ip'),
            'get' => Yii::t('app', 'Get'),
            'post' => Yii::t('app', 'Post'),
            'raw_body' => Yii::t('app', 'Raw Body'),
            'files' => Yii::t('app', 'Files'),
            'all_data' => Yii::t('app', 'All Data'),
        ];
    }
}