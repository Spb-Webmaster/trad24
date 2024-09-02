<nav>
    <ul  class="top_menu">
        @foreach($menu as $m)
            <li class="{{ active_linkParse(asset( $m['menu']->slug ), 'find') }} {{ active_linkReligion($m['religion']) }}"><a class="{{ active_linkParse(asset( $m['menu']->slug ), 'find') }}  @if($loop->first) lodge @endif" href="{{ asset( $m['menu']->slug ) }}"><span>  {{ $m['menu']->title }}</span></a>
            </li>
        @endforeach



    </ul>
</nav>
