$(document).ready(function (){
    $('.nav-admin-item').hover(
        function (){
            $(this).find('p').addClass('c-red')
            $(this).find('i').addClass('c-red')
            $(this).addClass('b-red')
        },
        function (){
            $(this).removeClass('b-red')

            $(this).find('p').removeClass('c-red')
            $(this).find('i').removeClass('c-red')
        },
    )
    $('.collapse-admin-index-block').on('click', function (){
        let block = $(this).parent().next();
        block.addClass('close-index-body')
        $(this).addClass('d-none')
        $(this).next().removeClass('d-none')
    })
    $('.open-admin-index-block').on('click', function (){
        let block = $(this).parent().next();
        block.removeClass('close-index-body')
        $(this).addClass('d-none')
        $(this).prev().removeClass('d-none')
    })
})
