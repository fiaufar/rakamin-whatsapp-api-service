<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageEvent;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function users(){
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json($user, 200);
    }

    public function getChatLists($to)
    {
        $msg = Message::where(['to' => $to])->orWhere(['from' => $to])->latest()->get();
        $userIds = [];
        foreach ($msg as $key => $value) {
            $userIds[] = $value->to == $to ? $value->from : $value->to;
        }
        $userIds = array_unique($userIds);
        $users = User::whereIn('id', $userIds)->get();

        return response()->json($users, 200);
    }

    public function getMessage($from, $to){
        $messages = Message::whereRaw(
            '(`from` = '. $from . ' AND `to` = ' . $to .
            ') OR (`to` = ' .$from . ' AND `from` = '.$to . ')')->latest()->get();

        return response()->json($messages, 200);
    }

    public function sendMessage(Request $request){
        $input = $request->all();
        $input['send_at'] = date('Y-m-d H:i:s');

        try {
            Message::create($input);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
        event(new MessageEvent($input));

        return response()->json('success', 200);
    }
}
