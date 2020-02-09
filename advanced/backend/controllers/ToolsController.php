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
// 错误时
//            {"code": 1, "msg": "error"}
// 正确时， 其中 attachment 指的是保存在数据库中的路径，url 是该图片在web可访问的地址
//            {"code": 0, "url": "http://domain/图片地址", "attachment": "图片地址"}
            if($imageFile->error){
                exit(json_encode(['retCode'=>1001,'retMsg'=>'圖片文件過大!','retMsgEn'=>"Object file too large!",'code'=>1,'msg'=>'error']));
            }
            if(!in_array($imageFile->getExtension(),['jpg','jpng','png','jpeg','ico'])){
                exit(json_encode(['retCode'=>1002,'retMsg'=>'文件格式不支持!','code'=>1,'msg'=>'error']));
            }

            $imageName = $dir .'/' . time() . uniqid() . '.' . $imageFile->extension;
            if($imageFile->saveAs($imageName)){
                exit(json_encode(['retCode'=>1000,'retMsg'=>'保存成功!','data'=>$imageName,'code'=>0,'url'=>Yii::$app->params['domain'].'/'.$imageName,'attachment'=>$imageName]));
            }else{
                exit(json_encode(['retCode'=>1004,'retMsg'=>'保存失敗!','error'=>1,'msg'=>"error"]));
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

    /**
     * Desc: 百度富文本编辑器
     * Created by Joker
     * Date: 2020/2/9
     * Time: 23:42
     * @return string
     */
    public function actionUEdit(){
        $model = new BlogForm();
        if (Yii::$app->request->isPost) {
        }
        return $this->render("uedit",['model'=>$model]);
    }

    /**
     * Desc: Redactor
     * Created by Joker
     * Date: 2020/2/10
     * Time: 00:27
     * @return string
     */
    public function actionRedactor(){
        $model = new BlogForm();
        if (Yii::$app->request->isPost) {
        }
        return $this->render("redactor",['model'=>$model]);
    }

    /**
     * Desc: webuploader
     * Created by Joker
     * Date: 2020/2/10
     * Time: 00:27
     * @return string
     */
    public function actionWebuploader(){
        $model = new BlogForm();
        if (Yii::$app->request->isPost) {
        }
        return $this->render("webuploader",['model'=>$model]);
    }

}