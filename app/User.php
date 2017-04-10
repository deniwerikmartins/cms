<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function post(){

        return $this->hasOne('App\Post');
        //pega o user_id / padrão
        //('App\Post', 'the_user_id'); / se nome do campo id do usuario na tabela for diferente
        //('App\Post', 'the_user_id', 'o_id_do_post') // se o nome do id do post na tabela for diferente

    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function roles(){

        return $this->belongsToMany('App\Role')->withPivot('created_at');
        //('App\Role', 'user_roles', 'user_id', 'role_id') //definir tabela e colunas com outro nome
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }
}
