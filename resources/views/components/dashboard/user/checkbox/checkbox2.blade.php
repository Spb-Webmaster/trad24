@props([
   'check' => 0,
   'id' => 'cheked_' . time(),
   'user_id' => false,
   'class' => ''
])
<div class="checkbox-wrapper-22">
    <label class="switch" for="{{$id}}">
        <input type="checkbox" @if($user_id) data-user_id="{{ $user_id  }}" @endif class="{{$class}}" id="{{$id}}"  @if($check) checked @endif/>
        <div class="slider round"></div>
    </label>
</div>
