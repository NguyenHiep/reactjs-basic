<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'fullname',
        'card',
        'phone',
        'birthday',
        'sign',
        'level',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getBirthdayAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();
        return $this->api_token;
    }

    public function scopeisAdmin($query)
    {
        return $query->where('level', 3);
    }

    public function book_follow()
    {
        return $this->belongsToMany(Books::class, 'user_follow_books', 'user_id', 'book_id')->withTimestamps();
    }

    public function list_book_follow()
    {
        return  $this->book_follow()->orderBy('created_at', 'desc')->paginate(5);
    }
}
