<?php

use yii\db\Schema;
use yii\db\Migration;

class m141017_194224_create_i18n_tables extends Migration {

    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE' .
                    ' utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%language}}', [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING . ' NOT NULL',
            'locale' => Schema::TYPE_STRING . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'default' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT 0',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);

        $this->createTable('{{%city_lang}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'language_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'city_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_city_lang_city', '{{%city_lang}}', 'city_id', '{{%city}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_city_lang_language', '{{%city_lang}}', 'language_id', '{{%language}}', 'id', 'CASCADE');

        $this->createTable('{{%street_lang}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'language_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'street_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_street_lang_street', '{{%street_lang}}', 'street_id', '{{%street}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_street_lang_language', '{{%street_lang}}', 'language_id', '{{%language}}', 'id', 'CASCADE');

        $this->createTable('{{%district_lang}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'language_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'district_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_district_lang_district', '{{%district_lang}}', 'district_id', '{{%district}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_district_lang_language', '{{%district_lang}}', 'language_id', '{{%language}}', 'id', 'CASCADE');

        $this->createTable('{{%category_lang}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'language_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_category_lang_category', '{{%category_lang}}', 'category_id', '{{%category}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_category_lang_language', '{{%category_lang}}', 'language_id', '{{%language}}', 'id', 'CASCADE');

        $this->createTable('{{%person_lang}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
            'language_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'person_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_person_lang_person', '{{%person_lang}}', 'person_id', '{{%person}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_person_lang_language', '{{%person_lang}}', 'language_id', '{{%language}}', 'id', 'CASCADE');

        $this->createTable('{{%event_lang}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
            'language_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'event_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_event_lang_event', '{{%event_lang}}', 'event_id', '{{%event}}', 'id', 'CASCADE');
        $this->addForeignKey('fk_event_lang_language', '{{%event_lang}}', 'language_id', '{{%language}}', 'id', 'CASCADE');
    }

    public function safeDown() {
        $this->dropForeignKey('fk_event_lang_language', '{{%event_lang}}');
        $this->dropForeignKey('fk_event_lang_event', '{{%event_lang}}');
        $this->dropTable('{{%event_lang}}');

        $this->dropForeignKey('fk_person_lang_language', '{{%person_lang}}');
        $this->dropForeignKey('fk_person_lang_person', '{{%person_lang}}');
        $this->dropTable('{{%person_lang}}');

        $this->dropForeignKey('fk_category_lang_language', '{{%category_lang}}');
        $this->dropForeignKey('fk_category_lang_category', '{{%category_lang}}');
        $this->dropTable('{{%category_lang}}');

        $this->dropForeignKey('fk_district_lang_language', '{{%district_lang}}');
        $this->dropForeignKey('fk_district_lang_district', '{{%district_lang}}');
        $this->dropTable('{{%district_lang}}');

        $this->dropForeignKey('fk_street_lang_language', '{{%street_lang}}');
        $this->dropForeignKey('fk_street_lang_street', '{{%street_lang}}');
        $this->dropTable('{{%street_lang}}');

        $this->dropForeignKey('fk_city_lang_language', '{{%city_lang}}');
        $this->dropForeignKey('fk_city_lang_city', '{{%city_lang}}');
        $this->dropTable('{{%city_lang}}');
        
        $this->dropTable('{{%language}}');
    }

}
