@extends('layouts.layout_cabinet')
@section('title', ($seo_title) ?? __('Кабинет пользователя / '. $item->title) )
@section('description', ($seo_description)?? __('Кабинет пользователя / ' . $item->title ) )
@section('keywords', ($seo_keywords)?? __('Кабинет пользователя / Публикации' . $item->title) )
@section('cabinet')
    <div class="auth">
        <div class="cabinet">
            <div class="block">

                <div class="hbox__top pad_b1">
                    <h1>{{__('Личный кабинет')}}</h1>
                </div>

                <div class="cabinet__flex  height_100">
                    <div class="cabinet__left">
                        <div class="cl">

                            @include('dashboard.left_bar.left')

                        </div>
                    </div>

                    <div class="cabinet__right">

                        @include('dashboard.menu.cabinet_menu')

                        <div class="cabinet_radius12_fff">

                            <div class="c__title_subtitle">
                                <h3 class="F_h1">{{ __('Публикация') }}</h3>
                                <div class="F_h2 pad_t5">
                                    <span>{{__('Страница публикации - ')}} {{ $item->title }}</span>
                                </div>
                            </div>



                            @if(isset($item))

                                <div class="_articles__foreach">
                                        <div class="_articles__item">
                                            <div class="edit__absolute">
                                                <div class="editMenuEdit">
                                                    <div class="editMenuEdit__ul">
                                                        <div class="editMenuEdit__li">
                                                            <a href="{{ route('cabinet.article.edit', ['user_id' => $user->id, 'id' => $item->id]) }}">Редактировать</a></div>
                                                        <div class="editMenuEdit__liForm">

                                                            <x-forms.delete-article
                                                                delete="{{__('Удалить')}}"
                                                                action="{{ route('cabinet.article.delete') }}"
                                                                id="{{ $item->id }}"
                                                                method="POST"
                                                            />


                                                        </div>

                                                    </div>
                                                </div>
                                                <span class="editJs edit__js">
                                                        <img alt="" width="24" height="24" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0yMS45OTk5IDEyLjAwMDFDMjEuOTk5OSAxNy40NTI4IDE3LjQxMzIgMjIgMTIgMjJDNi41Mjc1NCAyMiAyIDE3LjQ5MjEgMiAxMi4wMDAxQzIgNi41MDc4NiA2LjUyNzU0IDIgMTIgMkMxNy40OTIgMiAyMS45OTk5IDYuNTA3ODYgMjEuOTk5OSAxMi4wMDAxWk00Ljk5MjIyIDExLjk4MDNDNC45OTIyMiAxMi44MjY4IDUuNjgxMiAxMy41MzUzIDYuNTI3NjQgMTMuNTM1M0M3LjM3NDEgMTMuNTM1MyA4LjA2MzA2IDEyLjgyNjggOC4wNjMwNiAxMS45ODAzQzguMDYzMDYgMTEuMTczMiA3LjM3NDEgMTAuNDQ0OCA2LjUyNzY0IDEwLjQ0NDhDNS42ODEyIDEwLjQ0NDggNC45OTIyMiAxMS4xNTM1IDQuOTkyMjIgMTEuOTgwM1pNMTAuNDY0NiAxMS45ODAzQzEwLjQ2NDYgMTIuODI2OCAxMS4xNzMzIDEzLjUzNTMgMTIuMDE5NyAxMy41MzUzQzEyLjg0NjUgMTMuNTM1MyAxMy41NTUyIDEyLjgyNjggMTMuNTU1MiAxMS45ODAzQzEzLjU1NTIgMTEuMTczMiAxMi44NDY1IDEwLjQ0NDggMTIuMDE5NyAxMC40NDQ4QzExLjE3MzMgMTAuNDQ0OCAxMC40NjQ2IDExLjE1MzUgMTAuNDY0NiAxMS45ODAzWk0xNS45MzcgMTEuOTgwM0MxNS45MzcgMTIuODI2OCAxNi42MjYgMTMuNTM1MyAxNy40NzI1IDEzLjUzNTNDMTguMjk5MyAxMy41MzUzIDE5LjAwOCAxMi44MjY4IDE5LjAwOCAxMS45ODAzQzE5LjAwOCAxMS4xNzMyIDE4LjMxODkgMTAuNDQ0OCAxNy40NzI1IDEwLjQ0NDhDMTYuNjI2IDEwLjQ0NDggMTUuOTM3IDExLjE1MzUgMTUuOTM3IDExLjk4MDNaIiBmaWxsPSIjNjY3MDg1Ii8+Cjwvc3ZnPgo=">
                                                    </span>
                                            </div>
                                            <h2 class="_articles_h2_title">{{ $item->title }}</h2>
                                            <div class="_articles_text desc">{!!   $item->article !!}</div>
                                        </div>
                                        <div class="_articles_options">
                                            <div class="_art_m _articles_options__more"><i></i><span>{!!   $item->viewer !!}</span></div>
                                            <div class="_art_m _articles_options__date_create"><i></i><span>{{rusdate3($item->created_at)}}</span> </div>
                                            <div class="_art_m _articles_options__date_update"><i></i><span>{{rusdate2($item->updated_at)}}</span></div>
                                        </div>


                                </div>
                            @endif


                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection

