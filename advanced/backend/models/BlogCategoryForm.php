<?php

namespace backend\models;

use common\models\BlogCategory;;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "blog_category".
 *
 * @property int $id
 * @property int $blog_id 文章ID
 * @property int $category_id 栏目ID
 */
class BlogCategoryForm extends BlogCategory
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_category';
    }

    /**
     * 获取博客关联的栏目,返回的是获取到的category_id
     */
    public static function getRelationCategorys ($blogId)
    {
        $res = static::find()->select('category_id')->where(['blog_id' => $blogId])->all();
        return $res ? ArrayHelper::getColumn($res, 'category_id') : [];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'category_id'], 'required'],
            [['blog_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blog_id' => '博客 ID',
            'category_id' => '栏目 ID',
        ];
    }
}
