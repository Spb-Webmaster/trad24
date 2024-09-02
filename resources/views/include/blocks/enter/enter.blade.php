@auth
            <a  href="{{ route('cabinet') }}" class="enter_to_website__a">
                <span>{{__('Личный кабинет')}}</span>
            </a>
@endauth
@guest
    <a  href="/login" class="enter_to_website__a">
        <span>{{__('Личный кабинет')}}</span>
    </a>
@endguest

