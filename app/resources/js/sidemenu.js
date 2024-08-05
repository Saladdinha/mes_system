console.log($(".sidemenu"))
$(".sidemenu_btn").on('click', function(e){
    const sidemenu = $('aside.sidemenu')
    if(sidemenu.hasClass('expanded')){
        sidemenu.removeClass('expanded')
    }else{
        sidemenu.addClass('expanded')
    }
})