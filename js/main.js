$(document).ready(function() {
    function toggleMenu() {
        $('#header-ul').toggleClass('active');
        if($('#header-ul').hasClass('active')){
            $('#header-ul').velocity({
                    translateY: ['0%', '-100%']
                },
                {
                    display: 'block',
                    duration: 800
                });
            $('#overlay').velocity({
                    opacity: [0.7,0]
                },
                {
                    display: 'block',
                    duration: 800
                });
        }
        else{
            $('#header-ul').velocity('reverse');
            $('#overlay').velocity('reverse');
            $('#header-ul').toggle();
            $('#overlay').toggle();
        }
    }
    $('#hamburger').click(toggleMenu);
    
    $('#hamburger').click(function(){
        $(this).toggleClass('active');
    });
});
