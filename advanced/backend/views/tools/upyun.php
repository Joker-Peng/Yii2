<?php
/**
 * Created by Joker.
 * Date: 2020/2/8
 * Time: 16:51
 */
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(["options" => ["enctype" => "multipart/form-data"]]);
?>

    <input type="file" accept="image/jpg,image/jpeg,image/png,image/gif" id="upload">
    <input type="hidden" name="file">
    <button>上传</button>

<?php ActiveForm::end(); ?>

<?php
    //上传
$js = <<<JS
    $(document).on('change', '#upload', function () {
        var formData = new FormData();
        formData.append("file", $("#upload")[0].files[0]);
        $.ajax({
            url : "upyun",
            type : "POST",
            data : formData,
            processData : false,
            contentType : false,
            beforeSend: function () {
            },
            success : function(data) {
            },
            error : function(responseStr) {
                console.log(responseStr);
            }
        });
    });
JS;
$this->registerJs($js);
?>
