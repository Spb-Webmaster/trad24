@props([
   'user' => '',
])

@if($user)
    <div class="cli_hot_user_Flex">
        <div class="cli_hot_user_left">
            <div class="blockForm">

                <div class="image-upload__cabinet ">
                    @if(isset($user->avatar))
                        <a class="co"
                           href="{{ asset(Storage::disk('public')->url($user->avatar)) }}"
                           data-fancybox="avatar">

                            <div class="site_avatar"
                                 style="background-image: url('@if($user->avatar){{  asset(intervention('120x120', $user->avatar, 'users/' . $user->id  . '/avatar')) }} @endif '); width: 100px; height: 100px"></div>

                        </a>
                    @else
                        <div class="site_avatar"
                             style="background-image: url('{!! 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K' !!}'); width: 100px; height: 100px"></div>
                    @endif
                </div>

            </div><!--.blockForm-->
        </div><!--.cli_hot_user_left-->
        <div class="cli_hot_user_right">
            <div class="hot_user_username">{{(isset($user->name))? $user->name : ' - '}}</div>
            <div class="hot_user_email">{{(isset($user->email))? $user->email : ' - '}}</div>
            @if(isset($user->phone))
                <div class="hot_user_phone"><a href="tel:{{ trim($user->phone) }}">{{ format_phone($user->phone)  }}</a></div>
            @endif
        </div><!--.cli_hot_user_right-->
    </div>
@endif


