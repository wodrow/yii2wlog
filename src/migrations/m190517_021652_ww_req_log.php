<?php

use yii\db\Schema;
use yii\db\Migration;

class m190517_021652_ww_req_log extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%ww_req_log}}',
            [
                'id'=> $this->bigPrimaryKey(20)->unsigned(),
                'app_id'=> $this->string(150)->notNull(),
                'created_at'=> $this->integer(11)->notNull(),
                'route'=> $this->string(150)->notNull(),
                'from_ip'=> $this->string(100)->null()->defaultValue(null),
                'get'=> $this->text()->null()->defaultValue(null),
                'post'=> $this->text()->null()->defaultValue(null),
                'raw_body'=> $this->text()->null()->defaultValue(null),
                'files'=> $this->text()->null()->defaultValue(null),
                'all_data'=> $this->text()->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%ww_req_log}}');
    }
}
