$(document).ready(function(){
        $('.btn-listen-radio').click(function(){
                if($(this).hasClass('radio-metal'))
                {
                        $('#radio-window').attr('src', 'https://carter.sgc-univ.net/radio/listen/radio-metal');
                }
                else
                {
                        if($(this).hasClass('radio-hardrock'))
                        {
                                $('#radio-window').attr('src', 'https://carter.sgc-univ.net/radio/listen/radio-hardrock');
                        }
                        else
                        {
                                alert('nooo');
                        }
                }
        });
});
