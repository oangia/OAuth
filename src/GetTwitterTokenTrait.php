<?php

namespace oangia\OAuth;

use Illuminate\Http\Request;

trait GetTwitterTokenTrait { 
	public function getToken(Request $request)
    {
        if(isset($_REQUEST['oauth_token'])) {
            dd([
                'oauth_token'         => $request->session()->get('token'),
                'oauth_token_secret'  => $request->session()->get('token_secret'),
                'oauth_verifier'      =>$_REQUEST['oauth_verifier']
            ]);
        } else {
            $connection = new Twitter(env('TWITTER_API'), env('TWITTER_SECRET'));
            $request_token = $connection->getRequestToken($request->url());

            $request->session()->put('token',$request_token['oauth_token']);
            $request->session()->put('token_secret', $request_token['oauth_token_secret']);
            $request->session()->save();

            if($connection->http_code == '200')
            {
                $twitter_url = $connection->getAuthorizeURL($request_token['oauth_token']);
                header('Location: ' . $twitter_url); 
                exit;
            }else{
                die("error connecting to twitter! try again later!");
            }
        }
    }
}