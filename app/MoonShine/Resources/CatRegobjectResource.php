<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Religion;
use App\MoonShine\Pages\CategoryTreePage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\CatRegobject;

use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<CatRegobject>
 */
class CatRegobjectResource extends TreeResource
{
    protected string $model = CatRegobject::class;

    protected string $title = 'CatRegobjects';

    protected string $column = 'title';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            BelongsTo::make('Религия', 'religion', resource: new ReligionResource())->nullable()->searchable(),
            Text::make(__('Заголовок'), 'title'),

        ];
    }

    public function formFields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make(__('Заголовок'), 'title')
                    ->required(),
                Slug::make(__('Алиас'), 'slug')
                    ->from('title')
                    ->unique(),
                BelongsTo::make('Религия', 'religion', resource: new ReligionResource())->nullable()->searchable(),

            ]),
        ];
    }



    public function rules(Model $item): array
    {
        return [];
    }

    public function getActiveActions(): array
    {
        return ['create',  'update', /* 'view', 'delete', 'massDelete'*/];
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
