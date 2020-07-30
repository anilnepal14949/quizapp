<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    private $limit = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'visible_password', 'occupation', 'address', 'phone', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function storeUser($data) {
        $data['visible_password'] = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $data['is_admin'] = 0;

        return User::create($data);
    }

    public function allUsers() {
        return User::latest()->paginate($this->limit);
    }

    public function getUserById($id) {
        return User::find($id);
    }

    public function updateUser($data, $id) {
        $user = $this->getUserById($id);
        if($data['password']) {
            $user->password = bcrypt($data['password']);
            $user->visible_password = $data['password'];
        }

        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];

        $user->save();
        return $user;
    }

    public function deleteUser($id) {
        $user = $this->getUserById($id);

        return $user->delete();
    }
}
