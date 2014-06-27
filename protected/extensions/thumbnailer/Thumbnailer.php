<?php

/**
 * Since Ver 0.1
 * 
 * Replace images with thumbnails and create a link to the actual image.
 */

Yii::import('application.extensions.phpQuery.phpQuery');

class Thumbnailer extends CWidget
{
	public $thumbsDir;
	public $thumbWidth;
	public $thumbHeight;
	
	public function init()
	{
		// Trim trailing slashes if exists
		$this->thumbsDir = rtrim($this->thumbsDir, '/');
		
		ob_start();
	}
	
	public function run()
	{
		$content = ob_get_clean();
		
		$formatted = phpQuery::newDocument($content);
		$imageNodes = pq('img');
		
		foreach ($imageNodes as $imNode)
		{
			$imNode = pq($imNode);
			$imPath = ltrim($imNode->attr('src'), '/');
			
			$thumbPath = $this->thumbsDir.'/'.basename($imPath);
			// Create thumbnail if not exists
			if (!file_exists($thumbPath))
			{
				$image = Yii::app()->image->load($imPath);

				if (!isset($this->thumbHeight) && isset($this->thumbWidth))
				{
					$image->resize($this->thumbWidth, null);
				}
				elseif (!isset($this->thumbWidth) && isset($this->thumbHeight))
				{
					$image->resize(null, $this->$this->thumbHeight);
				}
				elseif (isset($this->thumbWidth) && isset($this->thumbHeight))
				{
					$image->resize($this->thumbWidth, $this->thumbHeight);
				}
				else
				{
					die('Error! Thumbnailer Widget must have at least one size parameter: thumbWidth or thumbHeight');
				}
				
				$image->save($thumbPath);
			}
			
//			$imNode->wrap('<a href="'.$imPath.'" rel="gallery"></a>');
			$imNode->attr('src', '/' . $thumbPath);
		}
		
		echo $formatted;
	}
}
