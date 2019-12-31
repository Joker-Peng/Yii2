<?php

namespace backend\models;
use common\models\Member;
use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property string $name
 * @property string $mobile
 * @property int $gender
 * @property string|null $create_time
 * @property string|null $update_time
 */
class MemberForm extends Member
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name'], 'string', 'max' => 20],
            [['mobile'], 'string', 'max' => 11],
            ['name', 'required', 'message' => '请填写姓名'],
            ['mobile', 'required', 'message' => '请输入手机号'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'mobile' => '手机号',
            'gender' => '性别',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
        ];
    }
}
