<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta content="<?php print(site_description()); ?>" name="description">
                <meta content="Storm85" name="author">
                
                <title><?php print(site_title()); ?></title>
                
                <!-- CSS -->
                <link href="<?php print(base_url('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" media="screen" />
                <link href="<?php print(base_url('assets/css/styles.css')); ?>" rel="stylesheet" media="screen" />
                <link href="<?php print(base_url('assets/css/docs.css')); ?>" rel="stylesheet" media="screen" />
                
                <!-- Favicon -->
                <link rel="icon" type="image/png" href="<?php print(base_url('assets/img/miscellaneous/favicon.png')); ?>">
        </head>
        <body style="background:transparent url('<?php print(base_url('assets/img/miscellaneous/bg.png')); ?>') repeat 0 0">
                <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                        <div class="container">
                                <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="<?php print(base_url()); ?>"><?php print(site_title()); ?></a>
                                </div>
                                <div class="navbar-collapse collapse">
                                        <ul class="nav navbar-nav">
                                                <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse radios&nbsp;<b class="caret"></b></a>
                                                        <ul class="dropdown-menu">
                                                                <?php foreach($radios as $radio): ?>
                                                                <li><a href="<?php print(base_url('infos/'.$radio->url)); ?>"><span class="glyphicon glyphicon-music"></span>&nbsp;<?php print($radio->title); ?></a></li>
                                                                <?php endforeach; ?>
                                                        </ul>
                                                </li>
                                                <li>
                                                        <iframe id="radio-window" style="border:0 none;height:3em;width:38em;margin-top:.25em"></iframe>
                                                </li>
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right">
                                                <?php if($currentRole == 0): ?>
                                                <li><a href="<?php print(base_url('admin')); ?>"><span class="glyphicon glyphicon-lock"></span>&nbsp;Admin</a></li>
                                                <?php endif; ?>
                                                <li><a href="<?php print(base_url('logout')); ?>"><span class="glyphicon glyphicon-off"></span>&nbsp;Log out</a></li>
                                        </ul>
                                </div>
                        </div>
                </div>
