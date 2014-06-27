<?php


//SELECT 
//    newsId,
//    ((positive + 1.9208) / (positive + negative) - 
//        1.96 * SQRT((positive * negative) / (positive + negative) + 0.9604) / 
// 		(positive + negative)) / (1 + 3.8416 / (positive + negative)) 
// 	AS ci_lower_bound 
//    FROM tbl_rate_news WHERE positive + negative > 0 
//    ORDER BY ci_lower_bound DESC;


class AjaxController extends Controller
{

	// Для того чтобы убрать лишние проверки, здесь всегда нужен аякс запрос, иначе не выполняем action
	public function beforeAction()
	{
		parent::beforeAction();
		if(!Yii::app()->request->isAjaxRequest)
			return false;
	}
	
	

	public function actionChangeTheme()
	{
		if (Yii::app()->request->isAjaxRequest)
		{
			if (isset($_POST['theme']))
			{
				$theme = trim(strip_tags($_POST['theme']));

				$cookie = new CHttpCookie('themeColor', $theme);

				//Stores theme cookie 1 year
				$cookie->expire = time() + (60 * 60 * 24 * 30 * 12);

				Yii::app()->request->cookies['themeColor'] = $cookie;
			}
		}
	}


	protected function addFav($varName, $ownerClass)
	{
		if (Yii::app()->request->isAjaxRequest)
		{
			$postName = Yii::app()->request->getPost('postName');
			
			if (isset($_POST['postName']))
			{
				$id = Yii::app()->request->getPost('itemId');

				$item = array(
					'id' => $id,
					'ownerClass' => $ownerClass,
					'dateAdded' => time()
				);
				Session::put($postName, $item);
				echo json_encode($item);
			}
		}
	}


	protected function delFav($varName, $ownerClass)
	{
		if (Yii::app()->request->isAjaxRequest)
		{
			if (isset($_POST['delFav']))
			{
				$id = Yii::app()->request->getPost('itemId');

				$item = array(
					'id' => $id,
					'ownerClass' => $ownerClass,
					'dateAdded' => time()
				);
				Session::delByAttribute($varName, array('id' => $id));

				echo json_encode($item);
			}
		}
	}


	public function actionAddFav()
	{
		$modelClass = Yii::app()->request->getPost('model');
		$postName = Yii::app()->request->getPost('postName');
		$this->addFav($postName, $modelClass);
	}


	public function actionDelFav()
	{
		$modelClass = Yii::app()->request->getPost('model');
		$postName = Yii::app()->request->getPost('postName');
//		$this->delFav('favNews', 'delFavNews', 'News');
		$this->delFav($postName, $modelClass);
	}


	private function rate($model, $sessName, $modelField = 'id', $idName = 'itemId')
	{
		$sessData = array(
			$idName => $model->$modelField,
			'time' => time(),
			'dislike' => json_decode(Yii::app()->request->getPost('dislike'))
		);
		$changed = false;
		if (!empty(Yii::app()->session[$sessName]))
		{
			foreach (Yii::app()->session[$sessName] as $key => $val)
			{
				if (array_search($model->$modelField, $val))
				{
					$_SESSION[$sessName][$key] = $sessData;
					$changed = true;
				}
			}
		}
		if ($changed == false)
		{
			Session::put($sessName, $sessData);
		}
	}


	public function actionLike()
	{
		if (Yii::app()->request->isAjaxRequest)
		{
			if (isset($_POST['rateNews']))
			{
				if (!isset(Yii::app()->session['ratedNews']))
					Yii::app()->session['ratedNews'] = array();

				$dislike = json_decode(Yii::app()->request->getPost('dislike'));
				$modelClass = Yii::app()->request->getPost('model');
				$id = Yii::app()->request->getPost('itemId');
				
				$model = $modelClass::model()->findByPk($id);
				if ($dislike)
					++$model->negative;
				else
					++$model->positive;
				$model->save();
				$this->rate($model, 'ratedNews');
			}
		}

//	    RateNews::model()->findAllBySql($sql);
	}

}