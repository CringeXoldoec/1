<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController
{
    public function index(Request $request) {
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        return view('index', compact(var_name: 'messages'));

    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'text' => 'required|min:3',
            'name' => 'string|required|min:2'
        ]);
    
        $message = new Message();
        $message->text = $validatedData['text'];
        $message->name = $validatedData['name'];
        $message->is_offensive = false; 
        $message->save();
    
        return redirect()->back()->with('success', 'Сообщение успешно отправлено!');
    }

    public function markAsOffensive(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->is_offensive = true;
        $message->save();
    
        return redirect()->back();
    }

}
