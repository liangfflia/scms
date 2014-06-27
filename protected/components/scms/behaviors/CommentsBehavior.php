<?php

class CommentsBehavior extends CActiveRecordBehavior
{
	
	// Add parameters like limit, etc
	public function getComments()
	{
	    $owner = $this->getOwner();
	    $ownerClass = trim(get_class($owner));
	    $comments = Comments::model()->findAllByAttributes(array('ownerClass'=>$ownerClass, 'ownerId'=>$owner->id));
	    return $comments;
	}
	
	
	public function getCommentsCount()
	{
	    $owner = $this->getOwner();
	    $ownerClass = trim(get_class($owner));
	    $sql = "SELECT COUNT(id) commentsCount FROM `tbl_comments` WHERE `ownerId`='{$owner->id}' AND `ownerClass`='{$ownerClass}' ";
	    $command = Yii::app()->db->createCommand($sql);
	    $count = $command->queryScalar();
	    return $count;
	}
	
	
	public function addComment($text, $user, $userId = null, $isActive = 1, $status = 1)
	{
	    $comment = new Comments();
	    
	    $owner = $this->getOwner();
	    $ownerClass = trim(get_class($owner));
	    
	    $comment->ownerClass = $ownerClass;
	    $comment->ownerId = $owner->id;
	    
	    $comment->text = $text;
	    $comment->user = $user;
		if(isset($comment->userId))
			$comment->userId = $userId;
	    $comment->isActive = $isActive;
	    $comment->status = $status;
	    $comment->save();
	}
	
	
	public function delComment( $id )
	{
	    Comments::model()->deleteByPk($id);
	}

	
	public function beforeDelete($event)
	{
	    parent::beforeDelete($event);
	    $comments = $this->getComments();
	    if($comments != null)
	    {
		foreach($comments as $val)
		    $val->delete();
	    }
	}
	
	
}