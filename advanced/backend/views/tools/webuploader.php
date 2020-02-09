<?php
/**
 * Created by Joker.
 * Date: 2020/2/8
 * Time: 16:51
 */
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(["options" => ["enctype" => "multipart/form-data"]]);
?>
<?php
echo $form->field($model, 'content')->widget('manks\FileInput', [
]);
?>

<?php
echo $form->field($model, 'content')->widget('manks\FileInput', [
    'clientOptions' => [
        'pick' => [
            'multiple' => true,
        ],
        // 'server' => Url::to('upload/u2'),
        // 'accept' => [
        //     'extensions' => 'png',
        // ],
    ],
]); ?>
<?php ActiveForm::end(); ?>