<?php

namespace App\Livewire\Comments;

use App\Livewire\Comments\Traits\MyTraitComment;
use App\Models\UserArticleComment;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Support\Traits\Makeable;

class CommentText extends Component
{

    use MyTraitComment;
    use Makeable;

    public  $id;

    #[Validate('required')]
    public int $article_id; /** id поста к которому коммент */

    public string $model; /** передаем из blade нужную model*/
    public string $prefix = ''; /** передаем из blade нужный префикс model (пример article)*/
    public int $comment_id; /** id коммента к которому коммент */

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

    public function showAnswerForm($id) {
        $this->id =$id;
    }



    public function render()
    {
        return view('livewire.comments.comment-text', [
            'comments' => $this->load(),

        ]);
    }
}
