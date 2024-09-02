@props([
   'name' => '',
   'action' => '',
   'method' => 'post',
])

        <form class="form"
              action="{{ $action }}"
              method="{{ $method }}"
              name="{{$name}}"


        >
            @csrf
            {{ $slot  }}

        </form>
