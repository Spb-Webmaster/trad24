<?php

namespace Support\Manager;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Support\Module\ModuleData;

class CardManager
{

    public function __construct(
    )
    {

    }

    public function admin()
    {

        $manager = Manager::query()->where('fixed_users', 1)->first();
        $user = User::query()->where('id' , $manager->user_id)->first();

        $data = $this->get($manager, $user);

        return $this->return_view($data);

    }

    public function manager($user_id)
    {

        $manager = Manager::query()->where('user_id' , $user_id)->first();
        $user = User::query()->where('id' , $user_id)->first();

        $data = $this->get($manager, $user);

        return $this->return_view($data);

    }

    public function get($manager, $user)
    {
        $data = array();
        $data['image'] = $manager->image;
        $data['name'] = ($manager->name)?:$user->name;
        $data['title'] = ($manager->title)?:'Ваш персональный менеджер';
        $data['phone'] = ($manager->phone)?:$user->phone;
        $data['format_phone'] = ($manager->format_phone)?:$user->format_phone;
        $data['whatsapp'] = ($manager->whatsapp)?:'';
        $data['telegram'] = ($manager->telegram)?:'';
        $data['email'] = ($manager->email)?:$user->email;

        return $data;

    }

    public function allManagers()
    {

        $users = User::query()->where('manager' , 1)
            ->with('managers')
            ->get();
        return $users;

    }


    public function return_view (array $data)
    {
        return view('components.manager.card-manager',  $data );
    }



}
