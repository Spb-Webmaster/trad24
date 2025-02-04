<?php

namespace App\Livewire\Comments;

use App\Livewire\Comments\Traits\MyTraitComment;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Support\Traits\Makeable;

class Comment extends Component
{

    use MyTraitComment;
    use Makeable;
    #[Validate('required', message: 'Введите комментарий')]
    #[Validate('min:3', message: 'Минимум три знака')]
    #[Validate('max:2500', message: 'Максимально 2500 знаков')]
    public string $text = ''; /** сам коммент */

    #[Validate('required')]
    public int $article_id; /** id поста к которому коммент */


    #[Validate('required')]
    public int $user_id; /** тот кто комментирует */

    public string $model; /** передаем из blade нужную model*/
    public string $prefix = ''; /** передаем из blade нужный префикс model (пример article)*/


    public function save()
    {

        $create = $this->validate();
        if($create) {
            $this->create_comment($create, $this->model, $this->prefix);

            $this->reset('text');
            $this->dispatch('comment_created');
        }
    }

    public function render()
    {
        $user = auth()->user();
        return view('livewire.comments.comment', ['user' => $user]);
    }
}
