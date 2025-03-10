@extends('layouts.layout_cabinet')
@section('title', ($seo_title) ?? __('Кабинет пользователя (редактирование) / '. $item->title) )
@section('description', ($seo_description)?? __('Кабинет пользователя  (редактирование) / ' . $item->title ) )
@section('keywords', ($seo_keywords)?? __('Кабинет пользователя  (редактирование) / Публикации' . $item->title) )
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
                                <h3 class="F_h1">{{ __('Редактирование') }}</h3>
                                <div class="F_h2 pad_t5">
                                    <span>{{__('Страница редактирования публикации - ')}} {{ $item->title }}</span>
                                </div>
                            </div>

                            <x-forms.article-form
                                action="{{ route('cabinet.article.update') }}"
                                method="POST"
                            >
                                <div class="c__flex_100 pad_b24">

                                    <div class="text_input">
                                        <x-forms.text-input_fromLabel
                                            type="text"
                                            id="articleTitle"
                                            name="title_article"
                                            placeholder="Заголовок"
                                            value="{{ (old('title_article'))?: $item->title }}"
                                            class="input title_article"
                                            required="true"
                                            :isError="$errors->has('title_article')"
                                        />
                                        <x-forms.error class="error_title_article"/>

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



                                {{--                      <div class="main-container">
                                                          <div class="editor-container editor-container_classic-editor" id="editor-container">
                                                              <div class="editor-container__editor">
                                                                  <textarea name="article" id="editor">{!! (old('article'))?: $item->article !!}</textarea>
                                                              </div>
                                                          </div>
                                                      </div>--}}

                                <div class="slotButtons slotButtons__right pad_t15">
                                    <div class=" text_input w_30">
                                        <input type="hidden" value="{{ $user->id  }}" name="user_id">
                                        <input type="hidden" value="{{ $item->id  }}" name="id">
                                        <x-forms.primary-button>
                                            {{ __('Редактировать запись') }}
                                        </x-forms.primary-button>
                                    </div>
                                </div>

                            </x-forms.article-form>

                            <br>

                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection

