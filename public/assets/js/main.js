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
    $('#check_all_show_model').on('click', function (){
        if($(this).prop("checked")){
            for ( let i of $('.checkbox-show-model')){
                i.checked = true
            }
            checked()
        }else {
            for ( let i of $('.checkbox-show-model')){
                i.checked = false
            }
            end_checked()
        }
    })
    function checked(){
        for (let i of $('.btn-show-model')){
            i.classList.remove('d-none')
        }
    }
    function has_checked(){
        let checked = false;
        for (let i of $('.checkbox-show-model')){
            if (i.checked){
                checked = true
            }
        }
        return checked;
    }
    function end_checked(){
        if(!has_checked()){
            for (let i of $('.btn-show-model')){
                i.classList.add('d-none')
            }
            $('#check_all_show_model').prop('checked', false)
        }
    }

    $('.checkbox-show-model').change(function (){
        if($(this).prop('checked')){
            checked()
        }else{
            end_checked()
        }
    })
})
