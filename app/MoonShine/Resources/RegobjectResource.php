<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\CatRegobject;

use App\Models\RegobjectFile;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regobject;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Position;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\HasOne;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<Regobject>
 */
class RegobjectResource extends ModelResource
{
    protected string $model = Regobject::class;

    protected string $title = 'Религиозные объекты';

    protected string $column = 'title';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Image::make(__('Изображение'), 'img'),
            Text::make(__('Заголовок'), 'title'),
            Date::make(__('Дата публикации'), 'created_at')
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

                    Tab::make(__('Общие настройки'), [
                        Grid::make([
                            Column::make([


                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique(),
                                    Image::make(__('Изображение'), 'img')
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('objects')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable()
                                        ->hint('Основное изображение. Обязательное поле.'),
                                    Image::make(__('Логотип'), 'logo')
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('objects')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable()
                                        ->hint('Подбирайте размер изображения правильно. Стороны у логотипа должны быть равными. В противном случае лишнее будет обрезано.'),])->show(),

                            ])->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle'),
                                    Text::make('Мета тэг (description) ', 'description'),
                                    Text::make('Мета тэг (keywords) ', 'keywords'),
                                    Switcher::make('Публикация', 'published')->default(1),
                                    Date::make(__('Дата публикации'), 'created_at')
                                        ->format("d.m.Y")
                                        ->default(now()->toDateTimeString())
                                        ->sortable(),

                                ])->show(),
                                Collapse::make('Вложенность', [
                                    BelongsTo::make('Регион', 'area', resource: new AreaResource())->nullable()->searchable(),
                                    BelongsTo::make('Категория', 'catregobject', resource: new CatRegobjectResource())->nullable()->searchable()
                                ])->show(),


                            ])
                                ->columnSpan(6)

                        ]),

                    ]),


                    Tab::make(__('O нас'), [

                        Grid::make([

                            Column::make([

                                Text::make(__('Заголовок главной страницы'), 'main_title'),
                                TinyMce::make('Описание на главной', 'main_desc'),

                            ])->columnSpan(6),

                            Column::make([

                                Image::make(__('Изображение'), 'main_right_img')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается справа'),
                                Textarea::make('Описание под изображением', 'main_right_img_text'),

                            ])->columnSpan(6),
                        ]),

                        Divider::make(),
                        Grid::make([
                            Column::make([
                                Image::make(__('Изображение'), 'a_img')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается слева'),

                            ])->columnSpan(6),
                            Column::make([
                                TinyMce::make('Текст', 'a_desc')
                                    ->hint('Встраивается справа, не оптекает'),
                            ])
                                ->columnSpan(6)
                        ]),
                        Divider::make(),
                        TinyMce::make('Описание', 'a_desc2')
                            ->hint('На всю ширину макета'),

                        Image::make(__('Изображение'), 'a_img2')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('objects')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),

                        Divider::make(),
                        Grid::make([
                            Column::make([
                                TinyMce::make('Описание', 'a_desc3')
                                    ->hint('Встраивается слева, не оптекает'),

                            ])->columnSpan(6),
                            Column::make([

                                Image::make(__('Изображение'), 'a_img3')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Встраивается справа'),

                            ])
                                ->columnSpan(6),
                        ]),


                        Divider::make(),
                        Grid::make([

                            Column::make([
                                TinyMce::make('Описание', 'a_desc4')
                                    ->hint('На всю ширину макета'),

                                Image::make(__('Изображение'), 'a_img4')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('objects')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()
                                    ->hint('Растягивается на 100% ширины'),
                            ])->columnSpan(12)
                        ]),
                    ]),

                    Tab::make(__('Вопрос-ответ'), [

                        Grid::make([

                            Column::make([
                                Text::make(__('Заголовок вопрос-ответ'), 'faq_title'),


                                Json::make('Вопрос-ответ (15)', 'faq')->fields([
                                            Position::make(),
                                            Text::make('Заголовок', 'faq_t'),
                                            TinyMce::make('Вопрос', 'faq_question'),
                                            TinyMce::make('Ответ', 'faq_response'),


                                ])->vertical()->creatable(limit: 15)
                                    ->removable(),

                                TinyMce::make('Описание', 'faq_desc'),
                            ])->columnSpan(12)

                        ]),
                    ]),


                    Tab::make(__('Деятельность'), [


                        Grid::make([

                            Column::make([

                                Text::make(__('Заголовок'), 'activity_title'),
                                TinyMce::make('Описание', 'activity_desc'),


                            ])->columnSpan(12)

                        ]),
                    ]),

                    Tab::make(__('Обряды'), [


                        Grid::make([

                            Column::make([

                                Text::make(__('Заголовок'), 'ritual_title'),
                                TinyMce::make('Описание', 'ritual_desc'),


                            ])->columnSpan(12)

                        ]),
                    ]),


                    Tab::make(__('Полезная информация'), [

                        Grid::make([

                            Column::make([

                                Text::make(__('Заголовок'), 'info_title'),

                                TinyMce::make('Описание', 'info_desc'),


                            ])->columnSpan(12)

                        ]),

                    ]),

                    Tab::make(__('Контакты'), [

                        Grid::make([

                            Column::make([
                                Text::make(__('Заголовок контактов'), 'contact_title'),
                                Text::make(__('Адрес'), 'contact_address'),
                                Text::make('Телефон 1', 'contact_phone1'),
                                Text::make('Телефон 2', 'contact_phone2'),
                                Text::make('Email', 'contact_email'),
                                Text::make('Координаты', 'contact_yandex_map'),
                                TinyMce::make('Описание контактов', 'contact_desc'),
                            ])->columnSpan(12)

                        ]),
                    ]),

                    Tab::make(__('Файлы'), [

                        Grid::make([

                            Column::make([

                                        Json::make('Файлы (150)', 'files')->fields([

                                              File::make('Файл', 'file_file')->dir('object_files')->disk('moonshine'),

                                                Text::make('Заголовок', 'file_title')->hint('НЕ выводится на сайте'),
                                                Text::make('Url', 'file_url')->readonly(),

                                        ])->creatable(limit: 150)->removable(),
                            ])->columnSpan(10),
                                  Column::make([


                           ])->columnSpan(2)

                        ]),
                    ]),
                ]),


            ]),
        ];


    }

    /**
     * @return //array, добавим кнопок для фильтрации
     */
    public function addQueryTags()
    {
        $categories = CatRegobject::query()->where('published', 1)->get();

        $QueryTag[0] = QueryTag::make(
            __('Все'),
            function (Builder $query) {
                return $query;
            }
        )->icon('heroicons.banknotes');

        foreach ($categories as $category) {
            $QueryTag[] = QueryTag::make(
                $category->title,
                function (Builder $query) use ($category) {
                    return $query->where('cat_regobject_id', $category->id);
                }
            )->icon('heroicons.banknotes');
        }

        return $QueryTag;

    }


    /**
     * @return //кнопки фильтрации
     */
    public function queryTags(): array
    {

        return $this->addQueryTags();
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
