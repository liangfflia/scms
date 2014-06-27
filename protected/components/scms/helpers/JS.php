<?php

class JS
{
    
    static public $id;
    
    static public function init( $id )
    {
        if(!isset(Yii::app()->clientScript->corePackages['jquery']))
        {
            Yii::app()->clientScript->registerCoreScript("jquery");
        }
        self::$id = $id;
        return new JS();
    }
    
    public function delElements($delUrl)
    {
        $jQueryId = JS::$id;
        
        Yii::app()->clientScript->registerScript('unsetChecked', "
                $('.deleteChecked').live('click', function(){
                        var checked = new Array();
                        $('td :checkbox:checked').each(function(){
                                checked.push($(this).attr('value'));
                        });
                        if($(this).hasClass('deleteChecked')){
                                ajaxUrl = '".$delUrl."';
                        }
                        if(checked.length > 0){
                                if(ajaxUrl == '".$delUrl."'){
                                        if(!confirm('Вы уверены?')){
                                                return false;
                                        }
                                }
                                        $.ajax({
                                                type: 'POST',
                                                dataType: 'html',
                                                url: ajaxUrl,
                                                'cache': false,
                                                data: {checked: checked, YII_CSRF_TOKEN: 1},
                                                success:function(data){
                                                        $('#".$jQueryId."').yiiGridView('update');
                                                }
                                        });
                        }
                });"
        );
        
        return $this;
    }
    
    
    public function search()
    {
        $jQueryId = self::$id;
        
        Yii::app()->clientScript->registerScript('search', "
                $('.search-button').click(function(){
                        $('.search-form').toggle();
                        return false;
                        });
                $('.search-form form').submit(function(){
                        $.fn.yiiGridView.update('".$jQueryId."', {
                        data: $(this).serialize()
                });
                        return false;
                        });
                ");
        
        return $this;
    }
    
    
    public function delElement($controller, $ajaxAction)
    {
	$jQueryId = self::$id;
	
        Yii::app()->clientScript->registerScript('unsetElement', "
                $('.commentElement').live('click', function(){
			var dataId = $(this).data('id');
			ajaxUrl = '".Yii::app()->baseUrl.'/'.$controller.'/'.$ajaxAction.'/id/'."'+dataId;

			if(!confirm('Вы уверены?')){
				return false;
			}

			$.ajax({
				type: 'POST',
				dataType: 'html',
				url: ajaxUrl,
				'cache': false,
				data: {YII_CSRF_TOKEN: 1},
				success:function(data){
				    var redirectUrl = window.location.href;
				    $(location).attr('href', redirectUrl);
				}
			});

                });"
        );
	
	return $this;
    }
    
    
    public function move($upUrl, $downUrl)
    {
        $jQueryId = self::$id;
        
        Yii::app()->clientScript->registerScript('moveChecked', "
                $('.moveUp, .moveDown').live('click', function(){
                        var checked = new Array();
                        $('td :checkbox:checked').each(function(){
                                checked.push($(this).attr('value'));
                        });
                        var ajaxUrl = '".$upUrl."';
                        if($(this).hasClass('moveDown')){
                                ajaxUrl = '".$downUrl."';
                        }
                        if(checked.length > 0){
                                $.ajax({
                                        type: 'POST',
                                        dataType: 'html',
                                        url: ajaxUrl,
                                        'cache': false,
                                        data: {checked: checked, YII_CSRF_TOKEN: 1},
                                        success:function(data){
                                                $('#".$jQueryId."').yiiGridView('update');
                                        }
                                });
                        }
                });"
        );

        return $this;
    }
    
	public function rating($className, $postName)
	{
        Yii::app()->clientScript->registerScript('rate'.$className, "
			$('.rated').live('click', function(){
				return false;
			});

			$('.like, .dislike').live('click', function(){

				var _this = $(this);

				var dataId = _this.data('id');
				var dislike = 0;
				if(_this.hasClass('dislike')) {
					dislike = 1;
				}

				$.ajax({
					type: 'POST',
					dataType: 'html',
					url: '/ajax/like',
					'cache': false,
					data: {\"$postName\": 1, model: \"$className\", dislike: dislike, itemId: dataId, YII_CSRF_TOKEN: 1},
					success:function(data){
						var parent = _this.parent();
						if(dislike) {
							parent.find('.like').remove();
							parent.find('.dislike').replaceWith('<span style=\"color: red;\" class=\"rated\">-1</span>');

							var span = parent.find('span.negativeVal');
							var value = parseInt(span.text());
							++value;
							span.text(value);

						} else {
							parent.find('.dislike').remove();
							parent.find('.like').replaceWith('<span style=\"color: green;\" class=\"rated\">+1</span>');

							var span = parent.find('span.positiveVal');
							var value = parseInt(span.text());
							++value;
							span.text(value);

						}
						_this.addClass('style-color');
						_this.parent().parent().find('.ratedItem').fadeIn();
					}
				});

				return false;
			});"
        );

        return $this;
	}
	
	
	public function fav($className, $postName)
	{
        Yii::app()->clientScript->registerScript('fav'.$className, "

			$('.faved, .fav').live('click', function(){

				var _this = $(this);
				var dataId = $(this).data('id');

				var url = '/ajax/addfav';
				var postData = {postName: \"$postName\", model: \"$className\", itemId: dataId, YII_CSRF_TOKEN: 1};
				var faved = false;

				if(_this.hasClass('faved')) {
					url = '/ajax/delfav';
					postData = {postName: \"$postName\", model: \"$className\", delFav: 1, itemId: dataId, YII_CSRF_TOKEN: 1};
					faved = true;
				}

				$.ajax({
					type: 'POST',
					dataType: 'html',
					url: url,
					cache: false,
					data: postData,
					success:function(data){
						if(faved) {
							_this.css('color', '');
							_this.removeClass('faved');
							_this.addClass('fav');
						} else {
							_this.css('color', '#F8BE2C');
							_this.removeClass('fav');
							_this.addClass('faved');
				//			return false;
						}
					}
				});
				return false;
			});"
        );

        return $this;
	}
	
}