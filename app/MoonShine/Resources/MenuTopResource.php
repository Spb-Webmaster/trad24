<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\MenuTopItem;
use App\MoonShine\Pages\CategoryTreePage;
use Illuminate\Database\Eloquent\Model;

use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;


class MenuTopResource extends TreeResource
{
    protected string $model = MenuTopItem::class;

    protected string $title = 'Верхнее меню';

    protected string $column = 'title';

    protected string $sortColumn = 'sorting';


    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make(__('Заголовок'), 'title'),
                Text::make(__('URL адрес'), 'slug'),
                Select::make('Религии', 'religion')
                    ->options([
                        '1' => 'Ислам',
                        '2' => 'Христианство',
                        '3' => 'Буддизм',
                        '4' => 'Иудаизм',

                    ])->multiple()->searchable()->hideOnIndex(),




            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [
            CategoryTreePage::make($this->title()),
            FormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            DetailPage::make(__('moonshine::ui.show')),
        ];
    }

    public function getActiveActions(): array
    {
        return ['create', 'view', 'update', 'delete', 'massDelete'];
    }


    public function import(): ?ImportHandler
    {
        return null;
    }



    public function export(): ?ExportHandler
    {
        return null;
    }

    public function treeKey(): ?string
    {
        return null;
    }

    public function sortKey(): string
    {
        return 'sorting';
    }
}
