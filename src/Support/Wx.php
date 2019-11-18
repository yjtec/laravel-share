<?php
namespace Yjtec\LaravelShare\Support;

use Cache;
use Yjtec\Support\Str;

class Wx
{
    private $cache_prefix = 'laravel_wxshare_';
    public function __construct($appId, $secret)
    {
        $this->appId  = $appId;
        $this->secret = $secret;
    }
    public function jsapi($uri)
    {
        $timestamp  = time();
        $wxnonceStr = Str::random(16);
        $ticket     = $this->ticket();
        $wxOri      = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s", $ticket, $wxnonceStr, $timestamp, $uri);
        $wxSha1            = sha1($wxOri);
        $data['timestamp'] = $timestamp;
        $data['nonceStr']  = $wxnonceStr;
        $data['wxticket']  = $ticket;
        $data['signature'] = $wxSha1;
        $data['appid']     = $this->appId;
        return $data;
    }
    public function token()
    {
        $key = $this->cache_prefix . 'access_token';
        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $appId  = $this->appId;
        $secret = $this->secret;
        $res    = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $appId . '&secret=' . $secret);
        $res    = json_decode($res, true);
        if (isset($res['errcode'])) {
            throw new \Exception($res['errmsg'], $res['errcode']);
        }
        $expiredAt = now()->addMinutes($res['expires_in'] / 60);
        Cache::put($key, $res['access_token'], $expiredAt);
        return $res['access_token'];
    }

    public function ticket()
    {
        $key = $this->cache_prefix . 'ticket';
        if (Cache::has($key)) {
            return Cache::get($key);
        }
        $token = $this->token();
        $url   = sprintf("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi", $token);
        $res   = file_get_contents($url);
        $res   = json_decode($res, true);
        if ($res['errcode'] != 0) {
            throw new \Exception($res['errmsg'], $res['errcode']);
        }
        $expiredAt = now()->addMinutes($res['expires_in'] / 60);
        Cache::put($key, $res['ticket'], $expiredAt);
        return $res['ticket'];
    }
}
