<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use Illuminate\Support\Facades\Auth;
use FCM;

class Notification extends Model
{

    protected $fillable = ['id_user', 'id_detail'];

    protected $dates = ['delete_at', 'created_at'];

    public function scopeToSingleDevice($token = null, $title = null, $body = null, $icon, $click_action)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);
        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default')
            ->setBadge($this->where('read_at', null)->count())
            ->setIcon($icon)
            ->setClickAction($click_action);
        $dataBuilder = new PayloadDataBuilder();
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        $token = $token;
        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        // return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();
        // return Array (key : oldToken, value : new token - you must change the token in your database)
        $downstreamResponse->tokensToModify();
        // return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();
        // return Array (key:token, value:error) - in production you should remove from your database the tokens
        $downstreamResponse->tokensWithError();
    }
    public function scopeToMultiDevice($query, $model, $title = null, $body = null, $icon, $click_action)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);
        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default')
            ->setBadge($this->where('read_at', null)->count())
            ->setIcon($icon)
            ->setClickAction($click_action);
        $dataBuilder = new PayloadDataBuilder();
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        // You must change it to get your tokens
        $tokens = $model->pluck('api_token')->toArray();
        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        // return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();
        // return Array (key : oldToken, value : new token - you must change the token in your database)
        $downstreamResponse->tokensToModify();
        // return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();
        // return Array (key:token, value:error) - in production you should remove from your database the tokens present in this array
        $downstreamResponse->tokensWithError();
    }

    public function scopeRead($query)
    {
        return $this->where('read_at', null)->orderBy('created_at', 'desc')->get();
    }
    public function scopeNumberAlert()
    {
        return Notification::with('detail');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
    public function detail()
    {
        return $this->belongsTo('\App\Models\DetailPinjam', 'id_detail', 'id');
    }
    /*use \Znck\Eloquent\Traits\BelongsToThrough;
    public function inventaris(){
        
        return $this->belongsToThrough(Inventaris::class, DetailPinjam::class);
    }*/
}
