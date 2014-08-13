<style type="text/css">
        body{padding-top:40px;padding-bottom:40px;background:#666 url('<?php print(base_url('assets/img/miscellaneous/bg.png')); ?>') repeat 0 0;height:100%;}
        .form-signin{max-width:330px;padding:15px;margin:0 auto}
        .form-signin h1{color:#428BCA;}
        .form-signin .checkbox,.form-signin .form-signin-heading{margin-bottom:10px}
        .form-signin .checkbox{font-weight:400}
        .form-signin .form-control{position:relative;font-size:16px;height:auto;padding:10px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
        .form-signin .form-control:focus{z-index:2}
        .form-signin input[type=text]{margin-bottom:-1px;}
        .form-signin input[type=password]{margin-bottom:10px;}
</style>
<div class="container">
        <?php print(form_open(base_url('verifylogin'), array('class' => 'form-signin'))); ?>
                <h1 style="margin-top:1em;">Please, Log in</h1>
                <?php print(validation_errors()); ?>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                <br/>
                <input type="password" class="form-control" id="passowrd" name="password" placeholder="Password" />
                <br/>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign In</button>
        </form>
</div>
