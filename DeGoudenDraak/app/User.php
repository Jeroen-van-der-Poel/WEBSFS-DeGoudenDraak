<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


    public function dishes()
    {
        return $this->BelongsToMany(Dish::class)->withPivot('amount', 'sale_date', 'comment');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }
    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn(‘name’, $roles)->first();
    }
    /**
     * Check one role
     * @param string $role
     */
    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'admin')
            {
                return true;
            }
        }
    }
    public function hasRole($role)
    {
        $roles = $this->roles()->where('name', $role)->count();
        if($roles == 1){
            return true;
        }
        return false;
    }

    public function hasARole()
    {
        $userRoles = Auth::user()->roles->pluck('name')->count();

        if($userRoles != 0){
            return true;
        }
        return false;
    }
}
