<?php
/**
 * Created by Joker.
 * Date: 2020/2/8
 * Time: 16:19
 */

namespace backend\controllers;
use backend\models\BlogForm;
use backend\models\Upload;
use yii\web\UploadedFile;
use Yii;
use Upyun\Upyun;
use Upyun\Config;

class ToolsController extends \yii\web\Controller
{
    /**
     *  文件上传
     *  我们这里上传成功后把图片的地址进行返回
     */
    public function actionUpload ()
    {
        $model = new Upload();
        $uploadSuccessPath = "";
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, "file");
            //文件上传存放的目录
            $dir = "uploads/".date("Ymd");
            if (!is_dir($dir))
                mkdir($dir);
            if ($model->validate()) {
                //文件名
                $fileName = date("HiHsHis").$model->file->baseName . "." . $model->file->extension;
                $dir = $dir."/". $fileName;
                $model->file->saveAs($dir);
                $uploadSuccessPath = "/uploads/".date("Ymd")."/".$fileName;
            }
        }
        return $this->render("upload", [
            "model" => $model,
            "uploadSuccessPath" => $uploadSuccessPath,
        ]);
    }

    /**
     * Desc: 图片异步上传
     * Created by Joker
     * Date: 2020/2/8
     * Time: 20:08
     * @return string
     */
    public function actionAsyn(){
        if (Yii::$app->request->isPost) {
            //文件上传存放的目录
            $imageFile = UploadedFile::getInstanceByName('file');
            $dir = "uploads/".date("Ymd");
            if (!is_dir($dir))
                mkdir($dir);

            if($imageFile->error){
                exit(json_encode(['retCode'=>1001,'retMsg'=>'圖片文件過大!','retMsgEn'=>"Object file too large!"]));
            }
            if(!in_array($imageFile->getExtension(),['jpg','jpng','png','jpeg','ico'])){
                exit(json_encode(['retCode'=>1002,'retMsg'=>'文件格式不支持!']));
            }

            $imageName = $dir .'/' . time() . uniqid() . '.' . $imageFile->extension;
            if($imageFile->saveAs($imageName)){
                exit(json_encode(['retCode'=>1000,'retMsg'=>'保存成功!','data'=>$imageName]));
            }else{
                exit(json_encode(['retCode'=>1004,'retMsg'=>'保存失敗!']));
            }

        }
        return $this->render("asyn");
    }

    /**
     * Desc: 上传文件到又拍云
     * Created by Joker
     * Date: 2020/2/8
     * Time: 20:27
     * @return string
     * @throws \Exception
     */
    public function actionUpyun(){
        if (Yii::$app->request->isPost) {
            $imageFile = UploadedFile::getInstanceByName('file');

            $imageName = date("Ymd") . time() . uniqid() . '.' . $imageFile->extension;
            $file = fopen($imageFile->tempName, 'r');
            $serviceConfig = new Config('image-joker', Yii::$app->params['upyun']['name'], Yii::$app->params['upyun']['pwd']);
            $client = new Upyun($serviceConfig);
            $client->write($imageName, $file);
        }
        return $this->render("upyun");
    }

    public function actionUEdit(){
        $model = new BlogForm();
        if (Yii::$app->request->isPost) {
        }
        return $this->render("uedit",['model'=>$model]);
    }

}