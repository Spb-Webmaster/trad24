<div class="livewire_component__comment_text_manager web_comments_wrap">
    {{-- In work, do what you enjoy. --}}
    <div class="cabinet_ob_peoles">
        @if(count($comments))

        <div class="user25_m_first">

            <div class="a_user__checkbox_all">
                <input class="checkbox-flip check_all" data-chance="" type="checkbox"
                       id="check_all">
                <label for="check_all"><span></span></label>
            </div>
            <div class="user25_m__article_first">
                Коментарий
            </div>

            <div class="user25_m_trush_first">
                Удалить
            </div>
        </div>

            @foreach($comments as $k=>$comment)
                <div class="user25_m no_nth_child" wire:key="{{ $comment->id }}">


                    <div class="a_user__checkbox">

                        <input class="checkbox-flip checkbox_change"
                               data-object="{{$comment->id}}"
                               data-checkbox="{{$k++}}" value="{{$k}}" type="checkbox"
                               id="check_{{$k}}">
                        <label for="check_{{$k}}"><span></span></label>

                    </div>

                    <div class="user25_m__article">
                        <div class="user25_m__article_padding pad_t10_important">

                            <div class="web_comment c_text desc">
                                <div class="web_comment__flex pad_b0_important">

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

                                    <div class="web_comment__text_wrap pad_r0_important pad_b28_important">
                                        <div class="web_comment__text desc">{!! $comment->text !!}</div>

                                        <div class="web_comment_date__flex">
                                            <div class="web_comment__date">{{rusdate($comment->created_at)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="user25_m_trush">

                        <div class="user25_m_trush_solid m_trush__js" data-model="App\Models\UserArticleComment"
                             data-object="{{ $comment->id }}">
                            <x-dashboard.icons.trush_solid/>
                        </div>

                    </div>



                </div>

                @if(count($comment->find))
                    @foreach($comment->find as $comment_find)
                <div class="user25_m no_nth_child background_biruza">

                    <div class="a_user__checkbox"> </div>

                    <div class="user25_m__article">
                        <div class="user25_m__article_padding pad_t10_important">

                            <div class="web_comment c_text desc">
                                <div class="web_comment__flex pad_b0_important">

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

                                    <div class="web_comment__text_wrap pad_r0_important pad_b6_important" style="border-bottom: none">
                                        <div class="web_comment__text desc">{!! $comment_find->text !!}</div>

                                        <div class="web_comment_date__flex">
                                            <div class="web_comment__date">{{rusdate($comment_find->created_at)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="user25_m_trush">

                        <div class="user25_m_trush_solid m_trush__js" data-model="App\Models\UserArticleComment"
                             data-object="{{ $comment_find->id }}">
                            <x-dashboard.icons.trush_solid/>
                        </div>

                    </div>



                </div>
                    @endforeach
                @endif

            @endforeach


        {{-- удаление--}}
        <div class="cart_icon__wrap">
            <div class="cart_icon cart_icon__js" data-model="App\Models\UserArticleComment">
                <div class="cart_icon_1em">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                         data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"></path>
                    </svg>
                </div>
            </div>
        </div>
        {{--удаление--}}
        {{ $comments->withQueryString()->links('pagination::default') }}
        @else
            <div class="color_grey color_grey_14 pad_b10">Нет комментариев</div>
        @endif

    </div>


</div>
