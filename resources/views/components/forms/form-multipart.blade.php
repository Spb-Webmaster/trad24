    @props([

   'action' => '',
   'method' => 'post',
   'buttons' => '',
   'enctype' => '',
   'id' => ''
])


    <div class="blockForm">

        <form class="form"
              action="{{ $action }}"
              method="{{ $method }}"
              id="{{ $id }}"
            {{ ($enctype)?'enctype='.$enctype : '' }}
        >
            @csrf
            @honeypot
            {{ $slot  }}
            {{ $buttons  }}
        </form>
    </div><!--.blockForm-->
