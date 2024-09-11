<div class="admin-index-block">
    <div class="admin-index-block-head">
        <div class="admin-index-block-title">
            <a href="{{route('admin.show_model', ['table'=>$name_table])}}">
                {{$title}}
            </a>
        </div>
        <div class="collapse-admin-index-block"><i class="fa fa-window-minimize" aria-hidden="true"></i></div>
        <div class="open-admin-index-block d-none"><i class="fa fa-plus" aria-hidden="true"></i></div>
    </div>
    <div class="admin-index-block-body">
        {{$slot}}
    </div>
</div>
