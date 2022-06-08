<?php

use yii\db\Migration;

/**
 * Class m220608_114749_config_fecha
 */
class m220608_114749_config_fecha extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user','fecha_nacimiento',$this->timestamp()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220608_114749_config_fecha cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220608_114749_config_fecha cannot be reverted.\n";

        return false;
    }
    */
}
