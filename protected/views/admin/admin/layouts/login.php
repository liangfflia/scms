<html>
<head>
    <title>Unify | Welcome...</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/res/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/res/css/style.css">
    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/res/css/headers/header1.css">
    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/res/plugins/bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/res/css/style_responsive.css">
    <link rel="shortcut icon" href="favicon.ico">        
    <!-- CSS Implementing Plugins -->    
    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/res/plugins/font-awesome/css/font-awesome.css">
    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/res/css/themes/default.css" id="style_color">
    <link rel="stylesheet" href="<?=Yii::app()->baseUrl?>/res/css/themes/headers/default.html" id="style_color-header-1">    
</head> 
<body>
<div class="container">		
	<div class="row-fluid">
        <form class="log-page"  id="login-form" action="/admin/admin/validate" method="post">
            <h3>You missed</h3>    
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input class="input-xlarge" type="text" placeholder="Username" name="User[username]" id="User_username">
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span>
                <input class="input-xlarge" type="text" placeholder="Password" name="User[password]" id="User_password" >
            </div>
            <div class="controls form-inline">
                <button class="btn btn-primary pull-right" type="submit">Login</button><br>
                    <?= isset($error)? $error : '' ?>
            </div>
        </form>
    </div><!--/row-fluid-->
</div><!--/container-->	
</body>
</html>