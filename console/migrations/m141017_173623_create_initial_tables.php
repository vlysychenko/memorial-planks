<?php

use yii\db\Schema;
use yii\db\Migration;

class m141017_173623_create_initial_tables extends Migration {

    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE' .
                    ' utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%city}}', [
            'id' => Schema::TYPE_PK,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);

        $this->createTable('{{%city_box}}', [
            'city_id' => Schema::TYPE_INTEGER,
            'top_lon' => Schema::TYPE_DECIMAL . '(10,7) NOT NULL',
            'top_lat' => Schema::TYPE_DECIMAL . '(9,7) NOT NULL',
            'left_lon' => Schema::TYPE_DECIMAL . '(10,7) NOT NULL',
            'left_lat' => Schema::TYPE_DECIMAL . '(9,7) NOT NULL',
            'bottom_lon' => Schema::TYPE_DECIMAL . '(10,7) NOT NULL',
            'bottom_lat' => Schema::TYPE_DECIMAL . '(9,7) NOT NULL',
            'right_lon' => Schema::TYPE_DECIMAL . '(10,7) NOT NULL',
            'right_lat' => Schema::TYPE_DECIMAL . '(9,7) NOT NULL',
            'center_lon' => Schema::TYPE_DECIMAL . '(10,7) NOT NULL',
            'center_lat' => Schema::TYPE_DECIMAL . '(9,7) NOT NULL',
                ], $tableOptions);
        $this->addPrimaryKey('pk_city_box', '{{%city_box}}', 'city_id');
        $this->addForeignKey('fk_city_box_city', '{{%city_box}}', 'city_id', '{{%city}}', 'id', 'CASCADE');

        $this->createTable('{{%district}}', [
            'id' => Schema::TYPE_PK,
            'city_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_district_city', '{{%district}}', 'city_id', '{{%city}}', 'id', 'RESTRICT');

        $this->createTable('{{%district_border_node}}', [
            'id' => Schema::TYPE_PK,
            'district_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'lon' => Schema::TYPE_DECIMAL . '(10,7) NOT NULL',
            'lat' => Schema::TYPE_DECIMAL . '(9,7) NOT NULL',
            'order' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_district_border_node_district', '{{%district_border_node}}', 'district_id', '{{%district}}', 'id', 'CASCADE');

        $this->createTable('{{%street}}', [
            'id' => Schema::TYPE_PK,
            'city_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_street_city', '{{%street}}', 'city_id', '{{%city}}', 'id', 'RESTRICT');

        $this->createTable('{{%address}}', [
            'id' => Schema::TYPE_PK,
            'district_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'street_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'house' => Schema::TYPE_STRING,
            'is_autofilled' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_address_district', '{{%address}}', 'district_id', '{{%district}}', 'id');
        $this->addForeignKey('fk_address_street', '{{%address}}', 'street_id', '{{%street}}', 'id');

        $this->createTable('{{%event}}', [
            'id' => Schema::TYPE_PK,
            'date_start' => Schema::TYPE_DATE,
            'date_end' => Schema::TYPE_DATE,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);

        $this->createTable('{{%plank}}', [
            'id' => Schema::TYPE_PK,
            'lon' => Schema::TYPE_DECIMAL . '(10,7) NOT NULL',
            'lat' => Schema::TYPE_DECIMAL . '(9,7) NOT NULL',
            'address_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date_installed' => Schema::TYPE_DATE,
            'event_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addForeignKey('fk_plank_address', '{{%plank}}', 'address_id', '{{%address}}', 'id');
        $this->addForeignKey('fk_plank_event', '{{%plank}}', 'event_id', '{{%event}}', 'id');
        $this->addForeignKey('fk_plank_user', '{{%plank}}', 'user_id', '{{%user}}', 'id');

        $this->createTable('{{%person}}', [
            'id' => Schema::TYPE_PK,
            'date_birth' => Schema::TYPE_DATE,
            'date_death' => Schema::TYPE_DATE,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);

        $this->createTable('{{%person_event}}', [
            'person_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'event_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addPrimaryKey('pk_person_event', '{{%person_event}}', ['person_id', 'event_id']);
        $this->addForeignKey('fk_person_event_person', '{{%person_event}}', 'person_id', '{{%person}}', 'id');
        $this->addForeignKey('fk_person_event_event', '{{%person_event}}', 'event_id', '{{%event}}', 'id');

        $this->createTable('{{%category}}', [
            'id' => Schema::TYPE_PK,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);

        $this->createTable('{{%person_category}}', [
            'person_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addPrimaryKey('pk_person_category', '{{%person_category}}', ['person_id', 'category_id']);
        $this->addForeignKey('fk_person_category_person', '{{%person_category}}', 'person_id', '{{%person}}', 'id');
        $this->addForeignKey('fk_person_category_category', '{{%person_category}}', 'category_id', '{{%category}}', 'id');

        $this->createTable('{{%image}}', [
            'id' => Schema::TYPE_PK,
            'filename' => Schema::TYPE_STRING . '(762) NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);

        $this->createTable('{{%plank_image}}', [
            'image_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'plank_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        $this->addPrimaryKey('pk_plank_image', '{{%plank_image}}', 'image_id');
        $this->addForeignKey('fk_plank_image_plank', '{{%plank_image}}', 'plank_id', '{{%plank}}', 'id');
        $this->addForeignKey('fk_plank_image_image', '{{%plank_image}}', 'image_id', '{{%image}}', 'id');
    }

    public function safeDown() {
        $this->dropForeignKey('fk_plank_image_image', '{{%plank_image}}');
        $this->dropForeignKey('fk_plank_image_plank', '{{%plank_image}}');
        $this->dropTable('{{%plank_image}}');

        $this->dropTable('{{%image}}');

        $this->dropForeignKey('fk_person_category_category', '{{%person_category}}');
        $this->dropForeignKey('fk_person_category_person', '{{%person_category}}');
        $this->dropTable('{{%person_category}}');

        $this->dropTable('{{%category}}');

        $this->dropForeignKey('fk_person_event_person', '{{%person_event}}');
        $this->dropForeignKey('fk_person_event_event', '{{%person_event}}');
        $this->dropTable('{{%person_event}}');

        $this->dropTable('{{%person}}');

        $this->dropForeignKey('fk_plank_address', '{{%plank}}');
        $this->dropForeignKey('fk_plank_event', '{{%plank}}');
        $this->dropForeignKey('fk_plank_user', '{{%plank}}');
        $this->dropTable('{{%plank}}');

        $this->dropTable('{{%event}}');

        $this->dropForeignKey('fk_address_district', '{{%address}}');
        $this->dropForeignKey('fk_address_street', '{{%address}}');
        $this->dropTable('{{%address}}');
        
        $this->dropForeignKey('fk_street_city', '{{%street}}');
        $this->dropTable('{{%street}}');

        $this->dropForeignKey('fk_district_border_node_district', '{{%district_border_node}}');
        $this->dropTable('{{%district_border_node}}');
        
        $this->dropForeignKey('fk_district_city', '{{%district}}');
        $this->dropTable('{{%district}}');
        
        $this->dropForeignKey('fk_city_box_city', '{{%city_box}}');
        $this->dropTable('{{%city_box}}');
        
        $this->dropTable('{{%city}}');
    }

}
