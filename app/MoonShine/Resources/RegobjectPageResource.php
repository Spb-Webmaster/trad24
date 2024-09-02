<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegobjectPage;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<RegobjectPage>
 */
class RegobjectPageResource extends ModelResource
{
    protected string $model = RegobjectPage::class;

    protected string $title = 'Страницы объектов';

    protected string $column = 'created_at';


    protected string $sortColumn = 'created_at';

    protected ?ClickAction $clickAction = ClickAction::EDIT;


    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

            Text::make('Название', 'title')
                ->useOnImport()
                ->showOnExport(),

            BelongsTo::make('Объект', 'regobject', resource: new RegobjectResource())->nullable()->searchable(),
        ];
    }

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Text::make(__('Заголовок'), 'title'),
            BelongsTo::make('Объект', 'regobject', resource: new RegobjectResource())->nullable()->searchable(),
            Date::make(__('Дата создания'), 'created_at')
                ->format("d.m.Y")
                ->default(now()->toDateTimeString())
                ->sortable(),

        ];
    }

    public function formFields(): array
    {
        return [
            Block::make([
                Tabs::make([

                    Tab::make(__('Страница'), [
                        Grid::make([
                            Column::make([


                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Text::make('Алиас', 'slug')->readonly()->hint('Формируется автоматически! Менять не нужно!'),

                                ])->show(),

                                Collapse::make('Страница ссылка', [
                                    Text::make('url', 'url')->hint('Введите полный url страницы для перехода.'),
                                ])->show(),

                                Collapse::make('CSS стили', [
                                    Textarea::make('CSS стили для страницы', 'css')
                                        ->hint('Все стили будут обернуты в тег style, писать <style> дополнительно – не нужно'),
                                ])->show(),


                            ])->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle'),
                                    Text::make('Мета тэг (description) ', 'description'),
                                    Text::make('Мета тэг (keywords) ', 'keywords'),
                                    Switcher::make('Публикация', 'published')->default(1),

                                ])->show(),
                                Collapse::make('Дата', [
                                    Date::make(__('Дата создания'), 'created_at')
                                        ->format("d.m.Y")
                                        ->default(now()->toDateTimeString())
                                        ->sortable(),
                                ])->show(),
                                Collapse::make('Вложенность', [
                                    BelongsTo::make('Объект', 'regobject', resource: new RegobjectResource())->nullable()->searchable()->required(),

                                ])->show(),


                            ])
                                ->columnSpan(6)

                        ]),



                        Divider::make(),

                        Grid::make([
                            Column::make([
                                TinyMce::make('Описание', 'a_desc')
                                    ->hint('Встраивается слева, не оптекает'),

                            ])->columnSpan(8),
                            Column::make([

                                Image::make(__('Изображение'), 'a_img')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается справа'),

                            ])
                                ->columnSpan(4),
                        ]),





                        Divider::make(),

                        TinyMce::make('Описание', 'a_desc2')
                            ->hint('На всю ширину макета'),

                        Image::make(__('Изображение'), 'a_img2')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('object_news')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),

                        Divider::make(),



                        Grid::make([
                            Column::make([
                                Image::make(__('Изображение'), 'a_img3')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('object_news')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается слева'),

                            ])->columnSpan(6),
                            Column::make([
                                TinyMce::make('Текст', 'a_desc3')
                                    ->hint('Встраивается справа, не оптекает'),
                            ])
                                ->columnSpan(6)
                        ]),




                        Divider::make(),
                        Grid::make([

                            Column::make([
                                TinyMce::make('Описание', 'a_desc4')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'a_img4')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('object_news')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12)
                        ]),



                    ]),


                ]),


            ]),
        ];


    }


    public function rules(Model $item): array
    {
        return [
            'metatitle' => 'max:1024',
            'description' => 'max:1024',
            'keywords' => 'max:1024',
        ];
    }

    public function getActiveActions(): array
    {
        return ['create', /*'view',*/ 'update', 'delete', 'massDelete'];
    }


    public function import(): ?ImportHandler
    {
        return null;
    }

    public function export(): ?ExportHandler
    {
        return null;
    }
}
