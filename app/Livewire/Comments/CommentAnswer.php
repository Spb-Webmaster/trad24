<?php

namespace App\Livewire\Comments;

use Livewire\Attributes\Validate;
use Livewire\Component;

class CommentAnswer extends Component
{
    #[Validate('required', message: 'Введите комментарий')]
    #[Validate('min:3', message: 'Минимум три знака')]
    #[Validate('max:2500', message: 'Максимально 2500 знаков')]
    public string $text = ''; /** сам коммент */

    #[Validate('required')]
    public int $article_id; /** id поста к которому коммент */

    #[Validate('required')]
    public int $comment_id; /** id коммента к которому коммент */

    public int $user_id; /** тот кто комментирует */

    public string $model; /** передаем из blade нужную model*/


    public function save()
    {
        $create = $this->validate();


        $create['text'] = textarea($create['text']);
        $create['user_article_id'] = ($create['article_id'])??null;
        $create['user_article_comment_id'] = ($create['comment_id'])??null;

        $this->model::create($create);
        $this->reset('text');
        $this->dispatch('comment_created');

    }


    public function render()
    {

        $user = auth()->user();

        return view('livewire.comments.comment-answer',['user' => $user]);
    }
}
