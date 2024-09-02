<?php
namespace Domain\Video\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class VideoQueryBuilder extends Builder
{
    public function get_video($slug)
    {
        return $this->where('published', 1)->where('slug', $slug);

    }
    public function get_videos()
    {
        return $this->where('published', 1);

    }
}

