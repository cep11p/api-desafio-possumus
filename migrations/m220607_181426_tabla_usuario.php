<?php

use yii\db\Migration;

/**
 * Class m220607_181426_tabla_usuario
 */
class m220607_181426_tabla_usuario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users',[
            'id' => $this->primaryKey()->notNull(),
            'nombre' => $this->string(200)->notNull(),
            'apellido' => $this->string(200)->notNull(),
            'nro_documento' => $this->string(200)->notNull(),
            'fecha_nacimiento' => $this->timestamp()->notNull(),
            'email' => $this->string(200)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220607_181426_tabla_usuario cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220607_181426_tabla_usuario cannot be reverted.\n";

        return false;
    }
    */
}
