<?php
/**
 * Created by PhpStorm.
 * User: wodrow
 * Date: 19-5-16
 * Time: 下午4:28
 */

namespace wodrow\yii2wlog\models;


use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use wodrow\yii2wtools\behaviors\Uuid;

/**
 * This is the model class for table "{{%ww_req_log}}".
 *
 * @author
 */
class WwReqLog extends \wodrow\yii2wlog\models\tables\WwReqLog
{
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => false,
                'updatedAtAttribute' => false,
            ],
            'blameable' => [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => false,
                'updatedByAttribute' => false,
            ],
            /*'uuid' => [
                'class' => Uuid::class,
                'column' => false,
            ],*/
        ]);
    }

    public function rules()
    {
        $rules = parent::rules();
        /*foreach ($rules as $k => $v) {
            if ($v[1] == 'required'){
                $rules[$k][0] = array_diff($rules[$k][0], ['created_at', 'updated_at', 'created_by', 'updated_by']);
            }
        }*/
        return ArrayHelper::merge($rules, []);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $attributeLabels = parent::attributeLabels();
        return ArrayHelper::merge($attributeLabels, []);
    }
}