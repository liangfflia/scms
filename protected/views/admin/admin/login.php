<div class="container" style="margin-bottom: 30px;">
	<div class="row-fluid">
        <form class="log-page"  id="login-form" action="/admin/admin/validate" method="post">
            <h3>You missed</h3>
	    <div>
	    <?= isset($error)? $error : '' ?>
	    </div>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input class="input-xlarge" type="text" placeholder="Username" name="User[login]" id="User_login">
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span>
                <input class="input-xlarge" type="password" placeholder="Password" name="User[pass]" id="User_pass" >
            </div>
            <div class="controls form-inline">
                <button class="btn btn-primary pull-right" type="submit">Login</button><br>
            </div>
        </form>
    </div><!--/row-fluid-->
</div><!--/container-->	
