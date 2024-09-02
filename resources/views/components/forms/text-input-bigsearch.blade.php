@props([
    'type' => 'text',
    'value'=> '',
    'isError' => false,
    'placeholder' => '',
    'id' => '',


])

<input
    type="{{ $type  }}"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    value="{{ $value  }}"

    {{ $attributes->class([
    '_is-error' => $isError,
    'inputClassSearch'
]) }}

>

