<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\AreaResource;
use App\MoonShine\Resources\CatRegobjectResource;
use App\MoonShine\Resources\InfoResource;
use App\MoonShine\Resources\ItemRegobjectResource;
use App\MoonShine\Resources\MenuBottomResource;
use App\MoonShine\Resources\MenuTopResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\RegobjectAboutResource;
use App\MoonShine\Resources\RegobjectActivityResource;
use App\MoonShine\Resources\RegobjectInfoResource;
use App\MoonShine\Resources\RegobjectMediaResource;
use App\MoonShine\Resources\RegobjectNewResource;
use App\MoonShine\Resources\RegobjectPageResource;
use App\MoonShine\Resources\RegobjectResource;
use App\MoonShine\Resources\RegobjectRitualResource;
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


            MenuGroup::make(static fn() => __('Категории объектов'), [

               MenuItem::make(
                    static fn() => __('Категории'),
                    new CatRegobjectResource()
                )->icon('heroicons.bars-3'),

                MenuItem::make(
                    static fn() => __('Объекты'),
                    new RegobjectResource()
                )->icon('heroicons.bars-arrow-up'),

                MenuItem::make(
                    static fn() => __('Новости объектов'),
                    new RegobjectNewResource()
                )->icon('heroicons.newspaper'),

                MenuItem::make(
                    static fn() => __('Левое меню объектов'),
                    new RegobjectPageResource()
                )->icon('heroicons.clipboard-document-list'),

                MenuItem::make(
                    static fn() => __('O нас'),
                    new RegobjectAboutResource()
                )->icon('heroicons.clipboard-document-list'),

                MenuItem::make(
                    static fn() => __('Медиа'),
                    new RegobjectMediaResource()
                )->icon('heroicons.clipboard-document-list'),

                MenuItem::make(
                    static fn() => __('Информация'),
                    new RegobjectInfoResource()
                )->icon('heroicons.clipboard-document-list'),

                MenuItem::make(
                    static fn() => __('Деятельность'),
                    new RegobjectActivityResource()
                )->icon('heroicons.clipboard-document-list'),

               MenuItem::make(
                    static fn() => __('Обряды'),
                    new RegobjectRitualResource()
                )->icon('heroicons.clipboard-document-list')

            ]),


/*            MenuGroup::make(static fn() => __('Страницы объектов'), [

               MenuItem::make(
                    static fn() => __('Страницы'),
                    new ItemRegobjectResource()
                )->icon('heroicons.outline.flag'),


            ]),*/



            MenuGroup::make(static fn() => __('Служебная информация'), [


                MenuItem::make(
                    static fn() => __('Субъекты РФ'),
                    new AreaResource()
                )->icon('heroicons.outline.building-library'),
                MenuItem::make(
                    static fn() => __('Религии'),
                    new ReligionResource()
                )->icon('heroicons.outline.rectangle-group'),

            ]),

            MenuGroup::make(static fn() => __('Настройки'), [


                MenuItem::make(
                    static fn() => __('SEO'),
                    new SeoResource()
                )->icon('heroicons.outline.bug-ant'),

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
