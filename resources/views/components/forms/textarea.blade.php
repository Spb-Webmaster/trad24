@props([
    'type' => '',
    'value'=> '',
    'isError' => false,
    'placeholder' => '',
    'id' => ''
])

<textarea
    type="{{ $type  }}"
    id="{{ $id }}"
    {{ $attributes->class([
    '_is-error' => $isError,
    'inputClass'
]) }}
>{!! $value !!}</textarea><label class="labelInput" for="{{ $id }}">{{ $placeholder }}</label>

