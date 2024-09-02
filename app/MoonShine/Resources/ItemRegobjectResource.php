<?php
/**
 *
 *
 *
 *
 * НЕ ВЫВОДИТСЯ !!!
 *
 *
 *
 *
 *
 */

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\ItemRegobject;

use MoonShine\Decorations\Collapse;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<ItemRegobject>
 */
class ItemRegobjectResource extends ModelResource
{
    protected string $model = ItemRegobject::class;

    protected string $title = 'Страницы';

    protected string $column = 'title';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Text::make(__('Заголовок'), 'title'),
            Slug::make(__('Алиас'), 'slug')

        ];
    }
    public function formFields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Collapse::make('Заголовок/Алиас', [
                    Text::make('Заголовок', 'title')->required(),
                    Slug::make('Алиас', 'slug')
                        ->from('title')->unique()
                ])->show() ,


                BelongsTo::make('Объект', 'regobject', resource: new RegobjectResource())->nullable()->searchable(),

            ]),
        ];
    }


    public function rules(Model $item): array
    {
        return [];
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
