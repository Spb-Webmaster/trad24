<nav>
    <ul id="top_menu" class="top_menu">
     @foreach($menu as $m)
              <li class="{{ active_linkParse(asset( $m['menu']->slug ), 'find') }} {{ active_linkReligion($m['religion']) }}"><a class="{{ active_linkParse(asset( $m['menu']->slug ), 'find') }} add__mobile_menu @if($loop->first) lodge @endif"
                    href="{{ asset( $m['menu']->slug ) }}"><span>  {{ $m['menu']->title }}</span></a>
            </li>
     @endforeach
    </ul>
</nav>

