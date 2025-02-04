<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Events\ResetPasswordEvent;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'published',
        'city',
        'fio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_photo(): HasMany
    {
        return $this->hasMany(UserPhoto::class)->orderBy('created_at', 'desc');
    }
    public function user_video(): HasMany
    {
        return $this->hasMany(UserVideo::class)->orderBy('created_at', 'desc');
    }
    public function user_article(): HasMany
    {
        return $this->hasMany(UserArticle::class)->orderBy('created_at', 'desc');
    }

    /**
     * @return integer
     */

    public function getUserCountPhotosAttribute() {
        return UserViewModel::make()->user_photos($this->id);
    }


    /**
     * Замена стандартного сброса пароля
     */

    public function sendPasswordResetNotification($token)
    {

        settype($data, "array");
        $data['email'] = $this->getEmailForPasswordReset();
        $data['token'] = $token;

        /**
         * Событие отправка сообщения о сбросе пароля
         */

        ResetPasswordEvent::dispatch($data);
    }

    protected static function boot()
    {
        parent::boot();

        # Проверка данных пользователя перед сохранением
        static::saving(function ($Moonshine) {


            $Moonshine->phone =  phone($Moonshine->phone);


        });



    }
}
