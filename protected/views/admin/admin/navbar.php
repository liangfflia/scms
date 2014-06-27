<div class="navbar navbar-fixed-top" style="z-index: 1031;">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <?php echo CHtml::link(Yii::app()->name, array('//admin'), array('class' => 'brand'))?>

            <div class="nav-collapse">
                <?php
                $this->widget('BHorizontalMenu', Manager::showMenu());
                ?>
                <ul class="nav pull-right">
					<?$groupedMenu = Manager::getMenuGrouped();?>
					<?if(!empty($groupedMenu)):?>
						<?foreach($groupedMenu as $k => $v):?>
							<?$isActive = false;?>
							<?foreach($v as $tmpV):?>
								<?if($tmpV['alias'] == $this->modelAlias):?>
									<?$isActive = true;?>
								<?endif;?>
							<?endforeach;?>
							<li class="dropdown<?=($isActive) ? ' active' : null?>">
								<a href="#"
								   class="dropdown-toggle"
								   data-toggle="dropdown">
									<?=$k?>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<?foreach($v as $val):?>
										<li <?=($this->modelAlias == $val['alias']) ? 'class="active"' : ''?>><?php echo CHtml::link($val['title'], array('/admin/'.$val['alias']))?></li>
									<?endforeach;?>
									<?php if (Yii::app()->user->checkAccess('admin')): ?>
									<li><?php echo CHtml::link('Управление пользователями', array('/admin/user/admin'))?></li>
									<?php endif;?>
								</ul>
							</li>
						<?endforeach;?>
					<?endif;?>
					

                    <li class="divider-vertical"></li>

                    <li><?php echo CHtml::link('Выход', array('/admin/logout'))?></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

<? $manager = Manager::model()->findByAttributes(array('alias'=>$this->modelAlias)); ?>
<? $settings = Settings::model()->countByAttributes(array('group'=>$this->modelAlias)); ?>

<div class="subnav subnav-fixed">
	<?if($this->modelAlias != 'admin'):?>
        <ul class="nav nav-pills">
			<li <?=($this->action->id == 'create') ? 'class="active"' : ''?>><a href="<?=Yii::app()->baseUrl?>/admin/<?=$manager->alias?>/create<?=(Yii::app()->controller->_ownerId) ? '/owner/'.Yii::app()->controller->_ownerId : ''?><?=(Yii::app()->controller->_ownerClass) ? '/owner_class/'.Yii::app()->controller->_ownerClass : ''?>">Создать</a></li>
			<li <?=($this->action->id == 'index') ? 'class="active"' : ''?>><a href="<?=Yii::app()->baseUrl?>/admin/<?=$manager->alias?><?=(Yii::app()->controller->_ownerId) ? '/index/owner/'.Yii::app()->controller->_ownerId : ''?><?=(Yii::app()->controller->_ownerClass) ? '/owner_class/'.Yii::app()->controller->_ownerClass : ''?>">Менеджер</a></li>
			<? if($settings > 0): ?>
				<li <?=($this->action->id == 'settings') ? 'class="active"' : ''?>><a href="<?=Yii::app()->baseUrl?>/admin/<?=$manager->alias?>/settings">Настройки</a></li>
			<? endif; ?>
        </ul>
	<?endif;?>
</div>