@extends('layouts.layout_cabinet')
<x-seo.meta
    title="Кабинет менеджера / Новые Изображения"
    description="Кабинет менеджера /  Новые Изображения "
    keywords="Кабинет менеджера /  Новые Изображения"
/>
@section('cabinet')
    <div class="auth">
        <div class="cabinet">
            <div class="block">

                <div class="hbox__top pad_b1">
                    <h1>{{__('Панель менеджера')}}</h1>
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
                                <h3 class="F_h1">{{ __('Изображения') }}</h3>
                                <div class="F_h2 pad_t5">
                                    <span>{{ __('Все фото и изображения пользователей сайта.')}}</span>
                                </div>
                            </div>
                            <div class="dashboardBox dashboardBox__a_user ">




                                <div class="cabinet_ob_peoles">

                                    <div class="user25_m_first">

                                        <div class="a_user__checkbox_all">
                                            <input class="checkbox-flip check_all" data-chance="" type="checkbox"
                                                   id="check_all">
                                            <label for="check_all"><span></span></label>
                                        </div>
                                        <div class="user25_m__img_first">
                                            Изображение
                                        </div>
                                        <div class="user25_m_data_first">
                                            Дата, формат
                                        </div>

                                        <div class="user25_m_trush_first">
                                            Удалить
                                        </div>
                                    </div>


                                    @if(isset($items))
                                        @foreach($items as $k=>$it)
                                            <div class="user25_m">


                                                <div class="a_user__checkbox">

                                                    <input class="checkbox-flip checkbox_change"
                                                           data-object="{{$it->id}}"
                                                           data-checkbox="{{$k++}}" value="{{$k}}" type="checkbox"
                                                           id="check_{{$k}}">
                                                    <label for="check_{{$k}}"><span></span></label>

                                                </div>

                                                <div class="user25_m__img">
                                                    <a class="co"
                                                       href="{{ asset(Storage::disk('public')->url($it->img)) }}"
                                                       data-fancybox="gallery"
                                                       data-caption=""

                                                    >
                                                        <img class="pc_category_img"
                                                             style="width: auto; height: auto"
                                                             loading="lazy"
                                                             src="{{ asset(intervention('120x120', $it->img, 'users/' . $it->user->id  . '/photos')) }}"
                                                             alt="photo_{{ $k }}" title="">
                                                    </a>

                                                </div>

                                                <div class="user25_m_data">

                                                    <div class="user25_m_list_item">
                                                        <x-dashboard.icons.users_solid/>
                                                        <span>Пользователь</span> —
                                                        <i><a class="photos_users_solid" href="{{ route('m_user_photos', ['user_id' => $it->user->id ]) }}">{{ $it->user->name }}</a></i>
                                                    </div>

                                                    <div class="user25_m_list_item">
                                                        <x-dashboard.icons.photos/>
                                                        <span>Дата загрузки</span> —
                                                        <i>{{ rusdate($it->created_at) }}</i>
                                                    </div>

                                                    <div class="user25_m_list_item">

                                                        <x-dashboard.icons.folder_solid/>
                                                        <span>Размер</span> —
                                                        <i>{{ convert_bytes(file_size($it->img)) }}</i>
                                                    </div>

                                                    <div class="user25_m_list_item">

                                                        <x-dashboard.icons.format_solid/>
                                                        <span>Формат</span> — <i>{{ file_mime($it->img)  }}</i>
                                                    </div>

                                                </div>

                                                <div class="user25_m_trush">

                                                    <div class="user25_m_trush_solid m_trush__js" data-model="App\Models\UserPhoto" data-object="{{ $it->id }}" >
                                                        <x-dashboard.icons.trush_solid/>
                                                    </div>

                                                </div>

                                            </div>

                                        @endforeach
                                    @endif

                                    {{-- удаление--}}
                                    <div class="cart_icon__wrap">
                                        <div class="cart_icon cart_icon__js" data-model="App\Models\UserPhoto" >
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
                                    {{ $items->withQueryString()->links('pagination::default') }}


                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div><!--.cabinet-->
        </div>
@endsection



