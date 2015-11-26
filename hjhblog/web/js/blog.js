$(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('#search').on('click', function(event) {
        if (event.target == this) {
            $(this).removeClass('open');
        }
    });
    
    // $('form').submit(function(event) {
    //     event.preventDefault();
    //     return false;
    // })


    $(".category-blog").on("click", function(event){
        $(".category-blog").removeClass('active');
        $(this).addClass("active");
    });
});