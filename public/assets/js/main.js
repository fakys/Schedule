$(document).ready(function (){
    $('.nav-admin-item').hover(
        function (){
            $(this).find('p').addClass('c-white')
            $(this).find('i').addClass('c-white')
            $(this).addClass('b-white')
        },
        function (){
            $(this).removeClass('b-white')
            $(this).find('p').removeClass('c-white')
            $(this).find('i').removeClass('c-white')
        },
    )
})
