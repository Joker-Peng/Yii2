<?php

namespace backend\models;
use common\models\Blog;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $content 内容
 * @property int $views 点击量
 * @property int $is_delete 是否删除 0未删除 1已删除
 * @property string $created_at 添加时间
 * @property string $updated_at 更新时间
 */
class BlogForm extends Blog
{
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
            [['content'], 'string'],
            [['views', 'is_delete'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            ['title', 'required', 'message' => '请填写标题'],
            ['content', 'required', 'message' => '请输入内容'],
            ['created_at', 'required', 'message' => '请输入创建时间'],
            ['updated_at', 'required', 'message' => '请输入修改时间'],
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
}

