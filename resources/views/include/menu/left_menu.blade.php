<ul class="replace_menu replace_menu__js scroll-container">
    @if($left_menu)
        @foreach($left_menu as $item_menu)
            <li class=""><a href="{{ asset($item_menu->slug) }}"><span>{{ ($item_menu->left_menutitle)?:$item_menu->title }}</span></a></li>
        @endforeach
    @endif
</ul>
