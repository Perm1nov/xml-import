<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 * @property int $id [int(11)]
 * @property string $name [varchar(255)]
 * @property string $description [varchar(255)]
 * @property string $image [varchar(255)]
 */
class Product extends ActiveRecord
{
}