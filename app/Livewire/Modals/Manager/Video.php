<?php

namespace App\Livewire\Modals\Manager;

use Livewire\Component;

class Video extends Component
{

    public $video;



    public function click_video() {

    }

    public function render()
    {
        return view('livewire.modals.manager.video', ['yakor' => rand(1, 10000000)]);
    }
}
