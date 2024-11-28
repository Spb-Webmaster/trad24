@props([
   'title' => '',
   'subtitle' => '',
   'action' => '',
   'method' => 'post',
   'buttons' => '',
])
    <div class="blockForm">
        <h1 class="blockForm__h1 text_center       @if($subtitle) pad_b5_important @endif">{{ $title }}</h1>
        @if($subtitle)
            <p class="blockForm__pSubTitle text_center pad_b24  color_grey color_grey_22">{{ $subtitle }}</p>
        @endif
        <form class="form"
              action="{{ $action }}"
              method="{{ $method }}"

        >
            @csrf
            @honeypot
            {{ $slot  }}
            {{ $buttons  }}
        </form>
    </div><!--.blockForm-->
