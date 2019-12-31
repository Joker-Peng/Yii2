<?php

namespace backend\models;
use common\models\Blog;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property string|null $create_time
 */
class BlogForm extends Blog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['create_time'], 'safe'],
            [['title'], 'string', 'max' => 100],
            ['title', 'required', 'message' => '请填写标题'],
            ['content', 'required', 'message' => '请输入内容'],
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
            'create_time' => '创建时间',
        ];
    }
}
