<?php
/**
 * Created by Joker.
 * Date: 2020/2/8
 * Time: 16:19
 */

namespace backend\models;
use Yii;
use yii\web\UploadedFile;
class Upload extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [["file"], "file",],
        ];
    }
}