<div class="livewire_component__comment_text_manager web_comments_wrap">
    {{-- In work, do what you enjoy. --}}
    @forelse($comments as $comment)
        <div class="web_comment_wrap" wire:key="{{ $comment->id }}">
            <div class="web_comment c_text desc">
                <div class="web_comment__flex">

                    <div class="web_comment__avatar">
                        @if(isset($comment->user->avatar))
                            <a href="{{ route('cabinet.people_photos', ['user_id' => $comment->user->id])  }}"
                               target="_blank" class="user25__avatar_img"
                               style="background-image: url('{{  asset(intervention('70x70', $comment->user->avatar, 'users/' . $comment->user->id  . '/avatar')) }}'); width: 40px; height: 40px">
                            </a>
                        @else
                            <a href="{{ route('cabinet.people_photos', ['user_id' => $comment->user->id])  }}"
                               target="_blank" class="user25__avatar_img"
                               style="background-color:#fff; background-image: url('{!! 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K' !!}'); width: 40px; height: 40px"></a>
                        @endif
                    </div>

                    <div class="web_comment__text_wrap">
                        <div class="web_comment__text desc">{!! $comment->text !!}

                                <div class="web_comment__delete">
                                    <button wire:click="delete({{ $comment->id }})">
                                        <x-dashboard.icons.archive-box />
                                    </button>

                                </div>

                        </div>

                        <div class="web_comment_date__flex">
                            <div class="web_comment__date">{{rusdate($comment->created_at)}}</div>
                        </div>



                        @if(count($comment->find))
                            <div class="web_comment__find">

                                @foreach($comment->find as $comment_find)

                                    <div class="web_comment__flex">
                                        <div class="web_comment__avatar">
                                            @if(isset($comment_find->user->avatar))
                                                <a href="{{ route('cabinet.people_photos', ['user_id' => $comment_find->user->id])  }}"
                                                   target="_blank" class="user25__avatar_img"
                                                   style="background-image: url('{{  asset(intervention('70x70', $comment_find->user->avatar, 'users/' . $comment_find->user->id  . '/avatar')) }}'); width: 40px; height: 40px">
                                                </a>
                                            @else
                                                <a href="{{ route('cabinet.people_photos', ['user_id' => $comment_find->user->id])  }}"
                                                   target="_blank" class="user25__avatar_img"
                                                   style="background-color:#fff; background-image: url('{!! 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOCAwQzguMDU5NSAwIDAgOC4wNTk1IDAgMThDMCAyNy45NDA1IDguMDU5NSAzNiAxOCAzNkMyNy45NDA1IDM2IDM2IDI3Ljk0MDUgMzYgMThDMzYgOC4wNTk1IDI3Ljk0MDUgMCAxOCAwWk0xOCA3LjUwMDA3QzIxLjcyMTUgNy41MDAwNyAyNC43NSAxMC41Mjg2IDI0Ljc1IDE0LjI1MDFDMjQuNzUgMTcuOTcxNiAyMS43MjE1IDIxLjAwMDEgMTggMjEuMDAwMUMxNC4yNzg1IDIxLjAwMDEgMTEuMjUgMTcuOTcxNiAxMS4yNSAxNC4yNTAxQzExLjI1IDEwLjUyODYgMTQuMjc4NSA3LjUwMDA3IDE4IDcuNTAwMDdaTTcuOTQ1NTEgMjkuMDk4NEMxMC42MDk1IDMxLjUxNDkgMTQuMTMgMzIuOTk5OSAxOCAzMi45OTk5QzIxLjg3IDMyLjk5OTkgMjUuMzkwNSAzMS41MTQ5IDI4LjA1NDUgMjkuMDk4NEMyNi43ODU1IDI2LjE2MTQgMjIuNzc2IDIzLjk5OTkgMTggMjMuOTk5OUMxMy4yMjQgMjMuOTk5OSA5LjIxNDUxIDI2LjE2MTQgNy45NDU1MSAyOS4wOTg0WiIgZmlsbD0iI0UwRTBFMCIvPgo8L3N2Zz4K' !!}'); width: 40px; height: 40px"></a>
                                            @endif
                                        </div>


                                        <div class="web_comment__text_wrap">
                                            <div class="web_comment__text desc">{!! $comment_find->text !!}</div>

                                            <div class="web_comment_date__flex web_comment_date_find__flex">
                                                <div class="web_comment__date">{{rusdate($comment_find->created_at)}}</div>
                                                    <div class="web_comment__delete comment_find__delete">
                                                        <button wire:click="delete({{ $comment_find->id }})">
                                                            <x-dashboard.icons.archive-box />
                                                        </button>

                                                    </div>
                                                
                                            </div>


                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endif


                    </div>

                </div>


            </div>
        </div><!--.web_comment_wrap-->

    @empty
        <div class="color_grey color_grey_14 pad_b10">Нет комментариев</div>
    @endforelse
    <div class="display_none__">{{ $comments->withQueryString()->links('pagination::default') }}</div>

</div>
