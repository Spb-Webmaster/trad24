<?php

declare(strict_types=1);

namespace App\Providers;


use App\MoonShine\Resources\AreaResource;
use App\MoonShine\Resources\FamilyCultureResource;
use App\MoonShine\Resources\FamilyGalleryResource;
use App\MoonShine\Resources\FamilyMainResource;
use App\MoonShine\Resources\FamilyMediaResource;
use App\MoonShine\Resources\FamilyNewResource;
use App\MoonShine\Resources\FamilyPageResource;
use App\MoonShine\Resources\FamilyPeopleResource;
use App\MoonShine\Resources\FamilyResource;
use App\MoonShine\Resources\InfoResource;
use App\MoonShine\Resources\ItemRegobjectResource;
use App\MoonShine\Resources\MenuBottomResource;
use App\MoonShine\Resources\MenuTopResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\ReligionResource;
use App\MoonShine\Resources\SeoResource;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\VideoResource;
use App\MoonShine\Resources\MoonShineUserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserRoleResource;
use YuriZoom\MoonShineMediaManager\Pages\MediaManagerPage;


class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [

            MenuGroup::make(static fn() => __('Система'), [
               MenuItem::make(
                   static fn() => __('Админ'),
                   new MoonShineUserResource()
               ),
                MenuItem::make(
                    static fn() => __('Пользователи'),
                    new UserResource()
                )->icon('heroicons.users'),
            ]),


            MenuGroup::make(static fn() => __('Категории'), [

                MenuItem::make(
                    static fn() => __('Новости'),
                    new InfoResource()
                )->icon('heroicons.newspaper'),
                MenuItem::make(
                    static fn() => __('Видеоматериалы'),
                    new VideoResource()
                )->icon('heroicons.video-camera'),


            ]),

            MenuGroup::make(static fn() => __('Материалы'), [

                MenuItem::make(
                    static fn() => __('Статичные страницы'),
                    new PageResource()
                )->icon('heroicons.newspaper')


            ]),


            MenuGroup::make(static fn() => __('Категории'), [



                MenuItem::make(
                    static fn() => __('Фамилии'),
                    new FamilyResource()
                )->icon('heroicons.bars-arrow-up'),

                MenuItem::make(
                    static fn() => __('О нас'),
                    new FamilyMainResource()
                )->icon('heroicons.clipboard-document-list'),

                MenuItem::make(
                    static fn() => __('Новости фамилий'),
                    new FamilyNewResource()
                )->icon('heroicons.newspaper'),

                MenuItem::make(
                    static fn() => __('Фотогалереи фамилий'),
                    new FamilyGalleryResource()
                )->icon('heroicons.newspaper'),


                MenuItem::make(
                    static fn() => __('Медиа фамилий'),
                    new FamilyMediaResource()
                )->icon('heroicons.clipboard-document-list'),


                MenuItem::make(
                    static fn() => __('Левое меню фамилий'),
                    new FamilyPageResource()
                )->icon('heroicons.clipboard-document-list'),

                MenuItem::make(
                    static fn() => __('Выдающиеся люди'),
                    new FamilyPeopleResource()
                )->icon('heroicons.clipboard-document-list'),


                MenuItem::make(
                    static fn() => __('Культурное наследие'),
                    new FamilyCultureResource()
                )->icon('heroicons.clipboard-document-list'),


            ]),




            MenuGroup::make(static fn() => __('Служебная информация'), [


                MenuItem::make(
                    static fn() => __('Субъекты РФ'),
                    new AreaResource()
                )->icon('heroicons.outline.building-library'),

            ]),

            MenuGroup::make(static fn() => __('Настройки'), [


                MenuItem::make(
                    static fn() => __('SEO'),
                    new SeoResource()
                )->icon('heroicons.outline.bug-ant'),

                MenuItem::make(
                    static fn () => __('Media manager'),
                    new MediaManagerPage(),
                ),


            ]),
            MenuGroup::make(static fn() => __('Меню'), [


                MenuItem::make(
                    static fn() => __('Верхнее меню'),
                    new MenuTopResource()
                )->icon('heroicons.bars-3'),

                MenuItem::make(
                    static fn() => __('Нижнее меню'),
                    new MenuBottomResource()
                )->icon('heroicons.bars-3'),

            ]),
        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
