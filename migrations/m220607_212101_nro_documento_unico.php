<?php

use yii\db\Migration;

/**
 * Class m220607_212101_nro_documento_unico
 */
class m220607_212101_nro_documento_unico extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user','nro_documento', $this->string(10)->unique());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220607_212101_nro_documento_unico cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220607_212101_nro_documento_unico cannot be reverted.\n";

        return false;
    }
    */
}
