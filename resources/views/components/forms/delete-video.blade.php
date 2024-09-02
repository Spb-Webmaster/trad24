@auth()
    @props([
     'action' => '',
     'method' => 'POST',
     'id' => '',
     'delete' => 'Удалить',
     'text' => 'Удаление видеоссылки. Вы уверены?',
])
    <form class="delete_survey_form"
        action="{{ $action }}"
        method="{{ $method }}"
        onSubmit="return confirm('{{$text}}') "
    >
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <button class="delete_survey_form__button" type="submit" >{{ $delete }}</button>
    </form>

@endauth
