<?php


namespace Rahim;


class Vk
{
    private $permission;
    private $request_parametrs;

    public function getAccess($client_id)
    {
        $this->permission = [
            'offline',
            'wall',
            'groups',
            'email',
            'photos',
            'video'
        ];

        $this->request_parametrs = [
            'client_id' => $client_id,
            'redirect_uri' => 'https://oauth.vk.com/blank.html',
            'response_type' => 'token',
            'display' => 'page',
            'scope' => implode(',',$this->permission),
            'v'=>5.69
        ];

        $url ='https://oauth.vk.com/oauth/authorize?'.http_build_query($this->request_parametrs);

        $url = urldecode($url);

        return $url;

    }

    public function usersGet($user_id,$access_token)
    {
        $fields             = ['first_name','last_name'];
        $request_parametrs = [
            'users.get'=>$user_id,
            'access_token'=>$access_token,
            'fields'=>implode(',',$fields),
            'v' => '5.21'
        ];

        $url        ="https://api.vk.com/method/users.get?".http_build_query($request_parametrs);

        $details    = file_get_contents($url);

        return $details;
    }

    public function postShare($user_id,$access_token,$post)
    {
        $request_parametrs = [
            'owner_id'=>$user_id,
            'friends_only'=>1,
            'message'=>$post,
            'access_token'=>$access_token,
            'v' => '5.21'
        ];

        $url ="https://api.vk.com/method/wall.post?".http_build_query($request_parametrs);

        return file_get_contents($url);
    }
}