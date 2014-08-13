<!DOCTYPE html>
<html>
        <head>
                <script src="<?php print(base_url('assets/js/jquery.min.js')); ?>"></script>
                <script src="<?php print(base_url('assets/js/mediaelement-and-player.min.js')); ?>"></script>

                <link rel="stylesheet" href="<?php print(base_url('assets/css/mediaelementplayer.min.css')); ?>" />
        </head>
        <body style="height:0;margin-top:4px;">
                <div style="float:left">
                        <audio id="player" src="<?php print($radio_url); ?>" type="audio/mp3" controls="controls" width="165" height="30">
                </div>
                <div style="float:right;color:#FFF;margin-top:.55em;width:20.5em;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:14px;">
                        <marquee id="currentsong"></marquee>
                </div>
                <script type="text/javascript">
                        function get_current_song() {
                                $.ajax({
                                        url: '<?php print(base_url('listen/currentsong/'.$radio_mountpoint)); ?>',
                                        dataType: 'json'
                                })
                                .done(function(data) {
                                        if(data.track == 'Unknown') {
                                                data.track = 'Advertising';
                                        }
                                        if (data.track != $('#currentsong').text()) {
                                                if ($('#currentsong').text() != '') {
                                                        if ($('#currentsong').text().indexOf('Up next: ') === 0) {
                                                                $('#currentsong').text(data.track);
                                                        } else {
                                                                $('#currentsong').text('Up next: ' + data.track);
                                                        }
                                                } else {
                                                        $('#currentsong').text(data.track);
                                                }
                                        }
                                });
                        }
                        
                        // JavaScript object for later use
                        var player = new MediaElementPlayer('#player', {
                                features: ['playpause', 'current', 'volume'],
                                alwaysShowHours: true
                        });

                        // Hide the progress bar
                        $('.mejs-time-rail').css('display', 'none');

                        player.play();

                        get_current_song();
                        setInterval(get_current_song, 2000);
                </script>
        </body>
</html>
