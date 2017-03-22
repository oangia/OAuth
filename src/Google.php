<?php

namespace oangia\OAuth;

use oangia\CUrl\CUrl;
use App\Exceptions\Users\OAuthAccessTokenInvalidException;

class Google {
    public function getInfo( $access_token ) {
        $url = 'https://www.googleapis.com/plus/v1/people/me?access_token=' . $access_token;
        $curl = new CUrl;
        $info = json_decode($curl->connect('GET', $url), true);
        if (isset($info['error'])) {
            throw new OAuthAccessTokenInvalidException('Access token invalid');
        }
        $info['email'] = isset($info['emails']) && isset($info['emails'][0]['value']) ? $info['emails'][0]['value'] : null;
        return $info;
    }
}