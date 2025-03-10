@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Кабинет пользователя / Публикации"
    description="Кабинет пользователя / Публикации"
    keywords="Кабинет пользователя / Публикации"
/>
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
                                <h3 class="F_h1">{{ __('Ваши видео') }}</h3>
                                <div class="F_h2 pad_t5">
                                    <span>{{__('Вы можете самостоятельно размещать ссылки с YouTube на свою страницу.')}}</span>
                                </div>
                            </div>


                            <x-forms.article-form
                                action="{{ route('cabinet.video.create') }}"
                                method="POST"
                            >

                                <div class="c__flex_100 pad_b6">

                                        <div class="text_input">
                                            <x-forms.text-input_fromLabel
                                                type="text"
                                                id="videoTitle"
                                                name="title_video"
                                                placeholder="Заголовок"
                                                value="{{ (old('title_video'))?:'' }}"
                                                class="input title_video"
                                                required="true"
                                                :isError="$errors->has('title_video')"
                                            />
                                            <x-forms.error class="error_title_video"/>

                                        </div>
                                    </div>

                                <div class="c__flex_100 pad_b24">

                                        <div class="text_input">
                                            <x-forms.text-input_fromLabel
                                                type="text"
                                                id="video"
                                                name="video"
                                                placeholder="Ссылка с YouTube или Rutube"
                                                value="{{ (old('video'))?:'' }}"
                                                class="input video"
                                                required="true"
                                                :isError="$errors->has('video')"
                                            />
                                            <x-forms.error class="error_video"/>

                                        </div>
                                    </div>


                                <div class="c__flex_100">
                                    <div class="text_input textarea_input pad_t0_important">
                                        <x-forms.textarea
                                            type="textarea"
                                            name="article"
                                            placeholder="Описание"
                                            value="{!!  (isset($item->article))? strip_tags($item->article, '<code><b><i><strong>') : (old('article')?:'') !!}"
                                            class="input article"
                                        />
                                        <x-forms.error class="error_article"/>

                                    </div>


                                </div>


                                {{--                            <div class="main-container">
                                                                <div class="editor-container editor-container_classic-editor" id="editor-container">
                                                                    <div class="editor-container__editor">
                                                                        <textarea name="article" id="editor">{!! (old('article'))?:'' !!}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>--}}

                            <div class="slotButtons slotButtons__right pad_t15">
                                <div class=" text_input w_30">
                                    <input type="hidden" value="{{ $user->id  }}" name="user_id">
                                    <x-forms.primary-button>
                                        {{ __('Создать запись') }}
                                    </x-forms.primary-button>
                                </div>
                            </div>

                            </x-forms.article-form>

                            @if(isset($items))

                                <div class="_articles__foreach pad_t60_important">
                                @foreach($items as $item)
                                            <div class="_articles__item">

                                                <div class="edit__absolute">
                                                    <div class="editMenuEdit">
                                                        <div class="editMenuEdit__ul">
                                                            <div class="editMenuEdit__li">
                                                                <a href="{{ route('cabinet.video.edit', ['user_id' => $user->id, 'id' => $item->id]) }}">Редактировать</a>
                                                            </div>
                                                            <div class="editMenuEdit__liForm">

                                                                <x-forms.delete-video
                                                                    delete="{{__('Удалить')}}"
                                                                    action="{{ route('cabinet.video.delete') }}"
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

                                                <h2 class="_articles_h2_title"><a href="{{ route('cabinet.video', ['user_id'=> $user->id, 'id' => $item->id]) }}">{{ $item->title }}</a></h2>
                                                <div class="_video_emb">

                                                    {!!  render_video($item->video, 658, 345)  !!}

                                                </div>
                                                <div class="_articles_text desc">{!!   $item->teasertext !!}</div>
                                            </div>

                                        <x-dashboard.user.options.options_article :item="$item"/>
                                        <hr>


                                @endforeach
                                </div>
                                <div class="display_none__">{{ $items->withQueryString()->links('pagination::default') }}</div>
                            @endif


                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection

