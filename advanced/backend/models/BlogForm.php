<?php

namespace backend\models;

use common\models\Blog;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $content 内容
 * @property string $category
 * @property int $views 点击量
 * @property int $is_delete 是否删除 0未删除 1已删除
 * @property string $created_at 添加时间
 * @property string $updated_at 更新时间
 */
class BlogForm extends Blog
{
    public $category;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'category'], 'required'],
            [['content'], 'string'],
            [['views', 'is_delete'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'views' => '点击量',
            'is_delete' => '是否删除',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    /**
     * 获取栏目的枚举值，
     * key=>value的形式组合:key表示栏目ID,value表示栏目名称
     * @param $key
     * @return array
     */
    public static function dropDownList ($key)
    {
        $query = static::find();
        $enums = $query->all();
        return [1=>"删除",0=>"不删除"];
    }
}

