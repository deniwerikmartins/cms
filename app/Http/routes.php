<?php

use App\Country;
use App\Photo;
use App\Post;
use App\Role;
use App\Tag;
use App\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*Route::get('/about', function () {
    return "Hia about page";
});

Route::get('/contact', function () {
    return "hi i am contact";
});

Route::get('/post/{id}/{name}', function($id, $name){
   return "this is post number " .$id. " " .$name;
});

Route::get('/admin/posts/example', array('as'=>'admin.home',  function(){
    $url = route('admin.home');

    return "this url is " . $url;
}));*/

//Route::get('/post/{id}', 'PostController@index');

//Route::resource('posts', 'PostsController');

//Route::get('/contact', 'PostsController@contact');
//
//Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');


/* -------------------------------------------
 *| RAW QUERIES                              |
 *|------------------------------------------| */
/*

Route::get('/insert', function(){
    DB::insert('insert into posts(title, content) values(?,?)', ['laravel is awasome with deni', 'laravel is the best thing that as happened to php, period']);
});*/

//Route::get('/read', function(){
//   $results = DB::select('select * from posts where id = ?', [1]);
//
//   //var_dump($results);
//
//   return var_dump($results);

//   foreach ($results as $result){
//       return $result->title;
//       //$result->content;
//   }
//});

//Route::get('/update', function(){
//
//    $updated = DB::update('update posts set title = "updated title" where id = ?', [1]);
//
//    return $updated;
//});
/*
Route::get('/delete', function (){

    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;
});*/

/* -------------------------------------------
 *| ELOQUENT                                 |
 *|------------------------------------------| */

//Route::get('/read', function(){
//
//    $posts = Post::all();
//
//    foreach ($posts as $post){
//        return $post->title;
//    }
//});

//Route::get('/find', function(){
//
//    $posts = Post::find(2);
//
//    return $posts->title;
//
//});

//Route::get('/findwhere', function(){
//
//    $posts = Post::where('id', 4)->orderBy('id', 'desc')->take(1)->get();
//
//    return $posts;
//
//});

/*Route::get('/findmore', function(){

//    $posts = Post::findOrFail(1);
//
//    return $posts;

    $posts = Post::where('id', '<', 50)->firstOrFail();
    return $posts;
});*/

//Route::get('/basicinsert', function(){
//
//    $post = new Post;
//
//    $post->title = 'new Eloquent title insert';
//
//    $post->content = 'wow eloquent is realy cool, look at this content';
//
//    $post->save();
//
//});

//Route::get('/basicinsert2', function(){
//
//    $post = Post::find(2);
//
//    $post->title = 'new Eloquent title insert 2';
//
//    $post->content = 'wow eloquent is realy cool, look at this content 2';
//
//    $post->save();
//
//});
/*
Route::get('/create', function(){

   Post::create(['title'=>'the create method 3', 'content'=>'wow i\'am learning a lot whi edwin diaz 3']);

});

//Route::get('/update', function(){
//
//    Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'new php title', 'content'=>'i love my instructor edwin']);
//
//});

Route::get('/delete', function(){

    $post = Post::find(4);

    $post->delete();
});*/

//Route::get('/delete2', function (){
//
//    Post::destroy([4,5]);
//
//    //  Post::where('is_admin',0)->delete();
//
//});
/*
Route::get('/softdelete', function (){

    Post::find(2)->delete();

});

Route::get('/readsoftdelete', function (){

//    $post = Post::find(7);
//
//    return $post;
    //retorna vazio, pois deleted não está null

//    $post = Post::withTrashed()->where('id',7)->get();
//
//    return $post;

//    $post = Post::withTrashed()->where('is_admin', 0)->get();
//
//    return $post;

//    $post = Post::onlyTrashed()->where('is_admin', 0)->get();
//
//    return $post;

//    $post = Post::onlyTrashed()->where('id', 7)->get();
//
//    return $post;

});

Route::get('/restore', function (){
   Post::withTrashed()->where('is_admin', 0 )->restore();
});

Route::get('/forcedelete', function(){
    Post::onlyTrashed()->where('is_admin', 0 )->forceDelete();
});*/

/* -------------------------------------------
 *| ELOQUENT RELATIONSHIPS                   |
 *|------------------------------------------| */

//ONE TO one relationhsip
/*
Route::get('/user/{id}/post', function($id){
    //->post = metodo cridao no model User
    //->content = campo no banco
    return User::find($id)->post->content;
});

Route::get('/post/{id}/user', function($id){

    return Post::find($id)->user->name;

});*/

//ONE TO Many relationhsip
/*
Route::get('/posts', function(){
    $user = User::find(1);

    foreach ($user->posts as $post){
        echo $post->title . "<br>";
        //return só vai retornar um titulo
    }
});

//Many TO Many relationhsip

Route::get('/user/{id}/role', function($id){
   $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
   return $user;

//   foreach ($user->roles as $role){
//       return $role->name;
//   }
});

//Acessing the intermediate table / pivot

Route::get('user/pivot', function(){
    $user = User::find(1);

    foreach ($user->roles as $role) {
        return $role->pivot->created_at;
    }
});

Route::get('/user/country', function(){

    $country = Country::find(4);

    foreach ($country->posts as $post){
        return $post->title;

    }

});*/

//polymorphic relations

Route::get('/user/photos', function(){
    $user = User::find(1);
    foreach ($user->photos as $photo){
        return $photo->path;
    }
});

Route::get('/post/{id}/photos', function($id){
    $post = Post::find($id);
    foreach ($post->photos as $photo){
        echo $photo->path . "<br>";
    }
});

Route::get('/photo/{id}/post', function($id){
   $photo = Photo::findOrFail($id);
   return $photo->imageable;
});

//polymorphic many to many

Route::get('/post/tag', function (){
   $post = Post::find(1);

   foreach ($post->tags as $tag){
       echo $tag->name;
   }
});

Route::get('/tag/post/', function (){
   $tag = Tag::find(2);

   foreach ($tag->posts as $post){
       echo $post->title;
   }
});


