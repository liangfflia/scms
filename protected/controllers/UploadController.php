<?php

class UploadController11111111111111111111111111 extends Controller
{
    
//	public function actionIndex()
//	{       
//            Yii::import('application.extensions.upload.Upload');
//            // receive file from post
//            $Upload = new Upload( (isset($_FILES['file']) ? $_FILES['file'] : null) );
//            if ($Upload->file_is_image===true){
//                $dir = Yii::app()->basePath  . DIRECTORY_SEPARATOR  .  '..' . DIRECTORY_SEPARATOR  .
//                    'images' . DIRECTORY_SEPARATOR .'news' . DIRECTORY_SEPARATOR .
//                    Yii::app()->user->name . DIRECTORY_SEPARATOR;
//                $fileName = md5(date('YmdHis'));
//                if ($Upload->uploaded) {
//                    $Upload->file_new_name_body = $fileName;                     
//                    $Upload->process($dir);
//                    if ($Upload->processed) {
//                        $link = Yii::app()->baseUrl  . '/images/news/' . Yii::app()->user->name . '/' . $Upload->file_dst_name;
//                        $response = array ('filelink' => $link);
//                        $this->_changeUploadedImagesFile($dir, $link);
//                        echo stripslashes(json_encode($response));
//                    }
//                }               
//            } else{
//                echo "it's not image";
//                
//            }
//        }
	public function actionIndex()
	{
		$ds = DIRECTORY_SEPARATOR;
		Yii::import('application.extensions.upload.Upload');
		// receive file from post
		$Upload = new Upload((isset($_FILES['file']) ? $_FILES['file'] : null));
		if ($Upload->file_is_image === true)
		{
			if(!isset(Yii::app()->session['newsUploadId']))
			{
				$uniqid = uniqid();
				Yii::app()->session['newsUploadId'] = $uniqid;
			} else {
				$uniqid = Yii::app()->session['newsUploadId'];
			}
			
//			$dir = Yii::app()->basePath . $ds . '..' . $ds . 'images' . $ds . 'news' . $ds . Yii::app()->user->name . $ds;
			$dir = Yii::app()->basePath . $ds . '..' . $ds . 'images' . $ds . 'news' . $ds . $uniqid . $ds;
//			$fileName = md5(date('YmdHis'));
			$fileName = uniqid();
			if ($Upload->uploaded)
			{
				$Upload->file_new_name_body = $fileName;
				$Upload->process($dir);
				if ($Upload->processed)
				{
//					$link = Yii::app()->baseUrl . '/images/news/' . Yii::app()->user->name . '/' . $Upload->file_dst_name;
					$link = Yii::app()->baseUrl . '/images/news/' . $uniqid . '/' . $Upload->file_dst_name;
					$response = array('filelink' => $link);
					$this->_changeUploadedImagesFile($dir, $link);
					echo stripslashes(json_encode($response));
				}
			}
		} else {
			echo "it's not image";
		}
	}
        
	protected function _changeUploadedImagesFile($pathToDirectory, $fileLink)
	{
		$pathToFile = $pathToDirectory . "images.json";
		if(file_exists($pathToFile)) {
			$images = json_decode(file_get_contents($pathToFile));                    
		}
		$count = count($images) +1;
		$newImage['thumb'] = $fileLink;
		$newImage['image'] = $fileLink;
		$newImage['title'] = 'Image ' . $count;
		$images[] = $newImage;
		file_put_contents($pathToFile, json_encode($images));
	}
        
}