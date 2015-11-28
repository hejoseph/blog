$(function () {

    $("#main_checkbox").click(function(){
        if($(this).is(':checked')){
            $(".user_blogs").prop("checked",true);
            $("#remove_dash").removeClass("hide");
        } else {
            $(".user_blogs").prop("checked",false);
            $("#remove_dash").addClass("hide");
            $("#edit_dash").addClass("hide");
        }

        if($(".user_blogs:checked").size() == 1){
            $("#remove_dash").removeClass("hide");
            $("#edit_dash").removeClass("hide");
        } else if($(".user_blogs:checked").size() > 1) {
            $("#edit_dash").addClass("hide");
        } else {
            $("#remove_dash").addClass("hide");
        }
    });

    $(".user_blogs").click(function(){
        if($(this).is(":checked")){
        } else {
            $("#main_checkbox").prop("checked",false);
        }

        if($(".user_blogs:checked").size() == $(".user_blogs").size()){
            $("#main_checkbox").prop("checked",true);
        }

        if($(".user_blogs:checked").size() == 1){
            $("#remove_dash").removeClass("hide");
            $("#edit_dash").removeClass("hide");
        } else {
            $("#edit_dash").addClass("hide");
        }

        if($(".user_blogs:checked").size() == 0){
            $("#remove_dash").addClass("hide");
        }
    });

    // $( '#table' ).searchable({
    //     striped: true,
    //     oddRow: { 'background-color': '#f5f5f5' },
    //     evenRow: { 'background-color': '#fff' },
    //     searchType: 'fuzzy'
    // });
    
    // $( '#searchable-container' ).searchable({
    //     searchField: '#container-search',
    //     selector: '.row',
    //     childSelector: '.col-xs-4',
    //     show: function( elem ) {
    //         elem.slideDown(100);
    //     },
    //     hide: function( elem ) {
    //         elem.slideUp( 100 );
    //     }
    // })

    

    // $('#myTab a:last').tab('show');
});