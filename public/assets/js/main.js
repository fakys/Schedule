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

    function update_table(pages, context_page){
        if(pages.length > context_page && 0 <= context_page){
            for(let i of $('.active-row')){
                i.classList.remove('active-row')
            }
            for (let i of pages[context_page]){
                i.classList.add('active-row')
            }
        }

    }

    $('.checkbox-show-model').ready(function (){
        let pages = [];
        let context_page = 0

        if($('.row-object').length>15){
            pages.push([])
            let rows=0
            for (let i of $('.row-object')){
                if(rows === 14){
                    pages[pages.length-1].push(i)
                    pages.push([])
                }else {
                    pages[pages.length-1].push(i)
                }
                rows+=1;
            }
        }else{
            pages.push($('.row-object'))
            $('.pagination').addClass('d-none')
        }
        update_table(pages, context_page)
        for(i=0; i<=pages.length-1; i++){
            let num_page = i+1
            let page_item = $("<li class='page-item page-link pagination-page-item'>")
            page_item.text(i+1)
            $('.pages-items').append(page_item)
        }
        $('.pagination-page-item').on('click', function (){
            context_page  = Number($(this).text())-1
            update_table(pages, context_page)
        })
        $('.pagination-prev').on('click', function (){
            if(context_page>=1){
                context_page-=1;
                update_table(pages, context_page)
            }
        })
        $('.pagination-next').on('click', function (){
            if(context_page<pages.length-1){
                context_page+=1;
                update_table(pages, context_page)
            }

        })
    })
})
