<?php
/**
 * Created by Joker.
 * Date: 2020/2/8
 * Time: 16:51
 */
use yii\widgets\ActiveForm;
use backend\assets\AppAsset;
AppAsset::register($this);
AppAsset::addCss($this,"/css/ueditor/themes/default/css/ueditor.min.css");
AppAsset::addScript($this,"/css/ueditor/third-party/jquery-1.10.2.js");
AppAsset::addScript($this,"/css/ueditor/ueditor.config.js");
AppAsset::addScript($this,"/css/ueditor/ueditor.all.js");
AppAsset::addScript($this,"/css/ueditor/lang/zh-cn/zh-cn.js");

$form = ActiveForm::begin(["options" => ["enctype" => "multipart/form-data"]]);
?>
<textarea name="content" id="blogform-content" cols="30" rows="10"><?=$model->content?></textarea>

<?php ActiveForm::end(); ?>

<!---->
<?php //$this->beginBlock("js-block") ?>
<!--    $(function () {-->
<!--        var ue = UE.getEditor('blogform-content',{});-->
<!--    });-->
<?php //$this->endBlock() ?>
<?php //$this->registerJs($this->blocks["js-block"], \yii\web\View::POS_END); ?>


<?php
//上传
$js = <<<JS
    $(function () {
        var ue = UE.getEditor('blogform-content',{});
    });
JS;
$this->registerJs($js);
?>
