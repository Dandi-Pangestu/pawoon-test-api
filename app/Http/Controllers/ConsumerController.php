<?php

namespace App\Http\Controllers;

use App\Consumer;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class ConsumerController extends Controller
{

    public function index(Request $request) {
        $consumers = Consumer::all();
        return response()->json($consumers, 200);
    }

    public function store(Request $request) {
        $input = $request->all();

        $consumer = new Consumer();
        $consumer->uuid = Uuid::generate()->string;
        $consumer->nama = $input['nama'];
        $consumer->alamat = $input['alamat'];

        if ($consumer->save()) {
            return response()->json(['message' => 'Created'], 201);
        } else {
            return response()->json(['message' => 'Error'], 500);
        }
    }
}
