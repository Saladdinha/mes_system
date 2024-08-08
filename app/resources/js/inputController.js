$('.select .head').on('click', function () {
    if ($(this).closest('.select').hasClass('active')) {
        $(this).closest('.select').removeClass('active')
    }else{
        $(this).closest('.select').addClass('active')
    }
})