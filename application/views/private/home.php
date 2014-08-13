<div class="jumbotron" style="background:#000 url('<?php print(base_url('assets/img/miscellaneous/jumbotron.png')); ?>') repeat 0 0">
        <div class="container">
                <h1 style="color:#666">Home</h1>
                <h3 style="color:#555">Welcome <?php print($username); ?> ! Select a radio below and enjoy the music !!</h3>
        </div>
</div>
<div class="container">
        <div class="row">
                <?php foreach($radios as $radio): ?> 
                <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" style="height:378px;">
                                <div style="width:350px;height:200px;text-align:center;">
                                        <img src="<?php print(base_url('assets/img/thumbnail/'.$radio->img_filename)); ?>" width="200" height="200">
                                </div>
                                <div class="caption">
                                        <h3><?php print($radio->title); ?></h3>
                                        <p style="height:3em;"><?php print($radio->short_desc); ?></p>
                                        <p><a class="btn btn-primary btn-listen-radio <?php print($radio->url); ?>" role="button">Listen</a>&nbsp;<a href="<?php print(base_url('infos/'.$radio->url)); ?>" class="btn btn-default" role="button">Infos</a></p>
                                </div>
                        </div>
                </div>
                <?php endforeach; ?>
        </div>
</div>

<script src="<?php print(base_url('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php print(base_url('assets/js/vendor/jquery.ui.widget.js')); ?>"></script>
<script src="<?php print(base_url('assets/js/bootstrap.min.js')); ?>"></script>

<script type="text/javascript">
        $(document).ready(function(){
                $('.btn-listen-radio').click(function() {
                        <?php foreach($radios as $radio): ?>
                        if($(this).hasClass('<?php print($radio->url); ?>')) {
                                $('#radio-window').attr('src', '<?php print(base_url('listen/'.$radio->url)); ?>');
                        }
                        <?php endforeach; ?>
                });
        });
</script>

