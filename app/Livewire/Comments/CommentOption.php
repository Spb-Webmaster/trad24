<?php

namespace App\Livewire\Comments;

use App\Livewire\Comments\Traits\MyTraitComment;
use App\Models\UserArticleComment;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;
use Livewire\Component;
use Support\Traits\Makeable;

class CommentOption extends Component
{
    use MyTraitComment;
    use Makeable;
    public int $article_id; /** id поста к которому коммент */

    public string $model; /** передаем из blade нужную model*/
    public string $prefix = ''; /** передаем из blade нужный префикс model (пример article)*/
    public  $count =  0;

    public function mount() {
        $this->load();
    }

    #[On('comment_created')]
    public function load()
    {
     /**     dd(get_class($this->item)); // пригодится
             dd(class_basename($this->item)); **/
        $this->count =   $this->load_comments_count($this->model, $this->prefix, $this->article_id);


    }
    public function render()
    {

        return view('livewire.comments.comment-option', ['
        count' => $this->count]);
    }
}
