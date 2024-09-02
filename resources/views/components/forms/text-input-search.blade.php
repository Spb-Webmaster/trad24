@props([
    'type' => 'text',
    'value'=> '',
    'isError' => false,
    'placeholder' => '',
    'id' => ''
])
<input
    type="{{ $type  }}"
    id="{{ $id }}"
    value="{{ $value  }}"
    placeholder="{{ $placeholder }}"

    {{ $attributes->class([
    '_is-error' => $isError,
    'inputClass'
]) }}
>
