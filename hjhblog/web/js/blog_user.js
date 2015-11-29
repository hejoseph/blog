$(function () {

    var main_checkbox = "#main_checkbox";
    var subclass_checkbox = ".user_blogs";
    var id_edit = "#edit_dash";
    var id_remove = "#remove_dash";

    dashboard_buttons(main_checkbox,subclass_checkbox,id_edit,id_remove);

    var main_checkbox = "#main_checkbox_blogger";
    var subclass_checkbox = ".blogger_blogger";
    var id_edit = "#edit_blogger";
    var id_remove = "#remove_blogger";

    dashboard_buttons(main_checkbox,subclass_checkbox,id_edit,id_remove);

    var main_checkbox = "#main_checkbox_blog";
    var subclass_checkbox = ".blog_blog";
    var id_edit = "#edit_blog";
    var id_remove = "#remove_blog";

    dashboard_buttons(main_checkbox,subclass_checkbox,id_edit,id_remove);

    var main_checkbox = "#main_checkbox_category";
    var subclass_checkbox = ".category_category";
    var id_edit = "#edit_category";
    var id_remove = "#remove_category";

    dashboard_buttons(main_checkbox,subclass_checkbox,id_edit,id_remove);

    var main_checkbox = "#main_checkbox_comment";
    var subclass_checkbox = ".comment_comment";
    var id_edit = "";
    var id_remove = "#remove_comment";

    dashboard_buttons(main_checkbox,subclass_checkbox,id_edit,id_remove);

    $("#myTab li").click(function(){
        if(!$(this).hasClass("pull-right")){
            $("#myTab li").removeClass("active");
            $(this).addClass("active");
            var id = $(this).children().attr("href");
            $(".tab-pane").removeClass("active");
            $(id).addClass("active");
        }
    });

    // $(main_checkbox).click(function(){
    //     if($(this).is(':checked')){
    //         $(subclass_checkbox).prop("checked",true);
    //         $(id_remove).removeClass("hide");
    //     } else {
    //         $(subclass_checkbox).prop("checked",false);
    //         $(id_remove).addClass("hide");
    //         $(id_edit).addClass("hide");
    //     }

    //     if($(subclass_checkbox+":checked").size() == 1){
    //         $(id_remove).removeClass("hide");
    //         $(id_edit).removeClass("hide");
    //     } else if($(subclass_checkbox+":checked").size() > 1) {
    //         $(id_edit).addClass("hide");
    //     } else {
    //         $(id_remove).addClass("hide");
    //     }
    // });

    // $(subclass_checkbox).click(function(){
    //     if($(this).is(":checked")){
    //     } else {
    //         $(main_checkbox).prop("checked",false);
    //     }

    //     if($(subclass_checkbox+":checked").size() == $(subclass_checkbox).size()){
    //         $(main_checkbox).prop("checked",true);
    //     }

    //     if($(subclass_checkbox+":checked").size() == 1){
    //         $(id_remove).removeClass("hide");
    //         $(id_edit).removeClass("hide");
    //     } else {
    //         $(id_edit).addClass("hide");
    //     }

    //     if($(subclass_checkbox+":checked").size() == 0){
    //         $(id_remove).addClass("hide");
    //     }
    // });




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

function dashboard_buttons(main_checkbox,subclass_checkbox,id_edit,id_remove){
    $(main_checkbox).click(function(){
        if($(this).is(':checked')){
            $(subclass_checkbox).prop("checked",true);
            $(id_remove).removeClass("hide");
        } else {
            $(subclass_checkbox).prop("checked",false);
            $(id_remove).addClass("hide");
            $(id_edit).addClass("hide");
        }

        if($(subclass_checkbox+":checked").size() == 1){
            $(id_remove).removeClass("hide");
            $(id_edit).removeClass("hide");
        } else if($(subclass_checkbox+":checked").size() > 1) {
            $(id_edit).addClass("hide");
        } else {
            $(id_remove).addClass("hide");
        }
    });

    $(subclass_checkbox).click(function(){
        if($(this).is(":checked")){
        } else {
            $(main_checkbox).prop("checked",false);
        }

        if($(subclass_checkbox+":checked").size() == $(subclass_checkbox).size()){
            $(main_checkbox).prop("checked",true);
        }

        if($(subclass_checkbox+":checked").size() == 1){
            $(id_remove).removeClass("hide");
            $(id_edit).removeClass("hide");
        } else {
            $(id_edit).addClass("hide");
        }

        if($(subclass_checkbox+":checked").size() == 0){
            $(id_remove).addClass("hide");
        }
    });
}