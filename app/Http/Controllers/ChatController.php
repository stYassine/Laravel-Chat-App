<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\ChatEvent;

use App\User;
use App\Chat;
use App\Friend;

use Auth;
use Session;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends =Auth::user()->friends();
        
        return view('chat.index')->with('friends', $friends);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'friend_id' => 'required'
        ]);
        
        $friend =new Friend();
        $friend->user_id =Auth::user()->id;
        $friend->user_id =$request->friend_id;
        $friend->save();
        
        Session::flash('friend_created', 'Friend Created Successfully');
        
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend =User::find($id);
        
        return view('chat.show')->with('friend', $friend);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function getChat($id){
        
        $chats =Chat::where(function($query) use ($id) {
            $query->where('user_id', '=', Auth::user()->id)->where('friend_id', '=', $id);
        })->orWhere(function($query) use ($id) {
            $query->where('user_id', '=', $id)->where('friend_id', '=', Auth::user()->id);
        })->get();
        
        return $chats;
    }
    
    public function sendChat(Request $request){
        
        $chat =Chat::create([
            'user_id' => $request->user_id,
            'friend_id' => $request->friend_id,
            'chat' => $request->chat
        ]);
        
        event(new ChatEvent($chat));
        
        return [];
        
    }
    
}
