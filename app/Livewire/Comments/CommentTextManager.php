<?php

namespace App\Livewire\Comments;

use App\Livewire\Comments\Traits\MyTraitComment;
use Livewire\Attributes\On;
use Livewire\Component;
use Support\Traits\Makeable;

class CommentTextManager extends Component
{
    use MyTraitComment;
    use Makeable;

    public int $article_id; /** id поста к которому коммент */

    public string $model; /** передаем из blade нужную model*/
    public string $prefix = ''; /** передаем из blade нужный префикс model (пример article)*/


    #[On('comment_created')]
    public function load()
    {
        return  $this->load_comments($this->model, $this->prefix, $this->article_id);

    }

    public function delete($comment_id)
    {
        $this->comment_id = $comment_id;
        $this->delete_comment($this->model, $this->prefix, $this->article_id, $this->comment_id);
        $this->dispatch('comment_created');

    }

    public function render()
    {
        return view('livewire.comments.comment-text-manager', [
            'comments' => $this->load(),
        ]);
    }
}
