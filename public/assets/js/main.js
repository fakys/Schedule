$(document).ready(function () {
    $('.nav-admin-item').hover(
        function () {
            $(this).find('p').addClass('c-red')
            $(this).find('i').addClass('c-red')
            $(this).addClass('b-red')
        },
        function () {
            $(this).removeClass('b-red')

            $(this).find('p').removeClass('c-red')
            $(this).find('i').removeClass('c-red')
        },
    )
    $('.collapse-admin-index-block').on('click', function () {
        let block = $(this).parent().next();
        block.addClass('close-index-body')
        $(this).addClass('d-none')
        $(this).next().removeClass('d-none')
    })
    $('.open-admin-index-block').on('click', function () {
        let block = $(this).parent().next();
        block.removeClass('close-index-body')
        $(this).addClass('d-none')
        $(this).prev().removeClass('d-none')
    })
    $('.checkbox-show-model').change(function (){
        if($(this).prop('checked')){
            checked()
        }else {
            end_checked()
        }
    })
    $('#check_all_show_model').on('click', function () {
        if ($(this).prop("checked")) {
            for (let i of $('.checkbox-show-model')) {
                i.checked = true
            }
            checked()
        } else {
            for (let i of $('.checkbox-show-model')) {
                i.checked = false
            }
            end_checked()
        }
    })
    function has_checked(){
        for (let i of $('.checkbox-show-model')) {
            if(i.checked){
                return true;
            }
        }
        return false;
    }

    function end_checked() {
        if (!has_checked()) {
            for (let i of $('.btn-show-model')) {
                i.classList.add('d-none')
            }
            $('#check_all_show_model').prop('checked', false)
        }else {
            if(count_checked() === 1){
                $('.btn-show-model-edit').removeClass('d-none')
            }
        }
    }

    function count_checked(){
        let count = 0;
        if (has_checked()) {
            for (let i of $('.checkbox-show-model')) {
                if(i.checked){
                    count+=1;
                }
            }
        }
        return count;
    }

    function checked() {
        if(count_checked() === 1){
            for (let i of $('.btn-show-model')) {
                i.classList.remove('d-none')
            }
        }else if(count_checked() > 1){
            $('.btn-show-model-edit').addClass('d-none')
            $('.btn-show-model-delete').removeClass('d-none')
        }
    }

    function on_null_show_table(){
        if($('.row-object').length == 0){
            $('.null-show-table').addClass('d-block')
        }
    }

    ///Delete Panel

    $('.close-delete-panel').on('click', function (){
        $('.delete-menu-container').removeClass('delete-menu-container-active')
    })
    function open_delete_panel(data){
        $('.delete-menu-container').addClass('delete-menu-container-active')
        for (let i of data){
            $('.delete-object-'+i).addClass('active-row-delete-panel')
            $('.delete-object-'+i).find('.check-row-delete-panel').prop('checked', true)
        }
    }

    $('#input_check_all_delete_pane').change(function (){

        if($(this).prop('checked')){
            for (let i of $('.active-row-delete-panel')){
                $(i).find('.check-row-delete-panel').prop('checked', true)
            }
        }else {
            for (let i of $('.active-row-delete-panel')){
                $(i).find('.check-row-delete-panel').prop('checked', false)
            }
        }
    })
    $('#reliability-delete').change(function (){
        if($(this).prop('checked')){
            $('.delete-btn-component').removeClass('d-none')
        }else {
            $('.delete-btn-component').addClass('d-none')
        }
    })

    function on_null_show_table(){
        if($('.row-object').length == 0){
            $('.null-show-table').addClass('d-block')
        }
    }
    $('.btn-show-model-delete').on('click', function (){
        let checkbox = $('.checkbox-show-model');
        let arr_id = []
        if(checkbox.length) {
            for (let i of checkbox) {
                if ($(i).prop('checked')) {
                    arr_id.push($(i).data('id'))
                }
            }
            open_delete_panel(arr_id)
        }
    })
})
