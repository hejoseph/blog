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

    var str = location.href;
    var res = str.split("/");
    if(res[res.length-2]=="category"){
        var id = res[res.length-1];
        $("#"+id).addClass("active");
    }
    

});