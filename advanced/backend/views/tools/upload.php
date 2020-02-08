<?php
/**
 * Created by Joker.
 * Date: 2020/2/8
 * Time: 16:21
 */

use yii\widgets\ActiveForm;

$form = ActiveForm::begin(["options" => ["enctype" => "multipart/form-data"]]);
?>
<?= $form->field($model, "file")->fileInput() ?>

    <button>上传</button>

<?php ActiveForm::end(); ?>