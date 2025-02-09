@props([
   'user' => '',
   'backround' => '',
])

@if($user)
    <a href="{{ route('m_user' , ['user_id' => $user->id] ) }}" class="user25 @if($backround) {{ $backround }} @endif">


        <div class="user25__avatar">
            @if(isset($user->avatar))
                <div class="user25__avatar_img"
                     style="background-image: url('{{  asset(intervention('70x70', $user->avatar, 'users/' . $user->id  . '/avatar')) }}'); width: 30px; height: 30px">
                </div>
            @else
                <div class="user25__avatar_img"
                     style="background-color:#fff; background-image: url('{!! 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K' !!}'); width: 30px; height: 30px"></div>
            @endif
        </div>

        <div class="user25__name_birthday">
            <div
                class="user25__name">{{ $user->name }}</div>
            <div
                class="user25__birthday color_grey color_grey_13">{{ (isset($user->birthdate))?rusdate3($user->birthdate):'—' }}</div>

        </div>

        <div class="user25__email_phone">
            <div
                class="user25__email">{{ $user->email }}</div>
            <div
                class="user25__phone">{{ ($user->phone)?format_phone($user->phone):'—' }}</div>

        </div>

        <div class="user25__icons">
            @if(count($user->user_photo))
                <div class="user25__one" title="Загружено изображений: {{ count($user->user_photo) }}">
                    <x-dashboard.icons.photos/>
                </div>
            @endif

            @if(count($user->user_video))
                <div class="user25__one" title="Загружено видео: {{ count($user->user_video) }}">
                    <x-dashboard.icons.videos/>
                </div>
            @endif
            @if(count($user->user_article))
                <div class="user25__one" title="Загружено статей: {{ count($user->user_article) }}">
                    <x-dashboard.icons.articles/>
                </div>
            @endif


        </div>


    </a>
@endif
