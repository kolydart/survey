<?php

namespace App;

use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
 */
class User extends Authenticatable
{
    /** activity log */
    use \Spatie\Activitylog\Traits\LogsActivity;
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    use Notifiable;
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'role_id'];
    protected $hidden = ['password', 'remember_token'];

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
