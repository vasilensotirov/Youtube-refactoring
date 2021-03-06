<?php

use router\Router;
use components\router\http\Request;
use components\Authenticator;

$router = new Router(new Request(), new Authenticator());

$router->route('/', 'VideoController@getAll');
$router->route('/video/upload', 'VideoController@upload', true);
$router->route('/video/delete/{id}', 'VideoController@delete', true);
$router->route('/video/edit/{id}', "VideoController@loadEdit", true);
$router->route('/video/edit', 'VideoController@edit', true);
$router->route('/video/{id}', 'VideoController@getById');
$router->route('/trending', 'VideoController@getTrending');
$router->route('/history', 'VideoController@getHistory', true);
$router->route('/watchlater', 'VideoController@getWatchLater', true);
$router->route('/likedvideos', 'VideoController@getLikedVideos', true);
$router->route('/library', 'VideoController@getByOwnerId', true);
$router->route('/video/user/{id}', 'VideoController@getByOwnerId', true);
$router->route('/video/{id}/react/{id}', 'UserController@reactVideo', true);
$router->route('/user/login', 'UserController@login');
$router->route('/user/register', 'UserController@register');
$router->route('/user/edit', 'UserController@edit', true);
$router->route('/user/logout', 'UserController@logout', true);
$router->route('/user/profile/{id}', 'UserController@getById', true);
$router->route('/subscriptions', 'UserController@subscriptions', true);
$router->route('/user/follow/{id}', 'UserController@follow', true);
$router->route('/user/unfollow/{id}', 'UserController@unfollow', true);
$router->route('/user/followed/{id}', 'UserController@clickedUser', true);
$router->route('/playlist/create', 'PlaylistController@create', true);
$router->route('/playlist/show/{id}', 'PlaylistController@getMyPlaylistsJSON', true);
$router->route('/myplaylists', 'PlaylistController@getMyPlaylists', true);
$router->route('/playlist/{id}', 'PlaylistController@clickedPlaylist', true);
$router->route('/playlist/{id}/video/{id}', 'PlaylistController@addToPlaylist', true);
$router->route('/search', 'SearchController@search');
$router->route('/comment/add', 'CommentController@add', true);
$router->route('/comment/delete/{id}', 'CommentController@delete',true);
$router->route('/comment/{id}/react/{id}', 'CommentController@react', true);
$router->route('/view/login', 'ViewController@viewRouter');
$router->route('/view/register', 'ViewController@viewRouter');
$router->route('/view/editProfile', 'ViewController@viewRouter');
$router->route('/view/upload', 'ViewController@viewRouter');
$router->route('/view/createPlaylist', 'ViewController@viewRouter');
$router->route('/view/profile', 'ViewController@viewRouter');
