<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = DB::table('messages')->get();
        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(CreateMessageRequest $request)
    {
        $data = $request->validated();

        DB::table('messages')->insert([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('messages.index')->with('info', 'Your message has been sent!');
    }

    public function show(string $id)
    {
        $message = DB::table('messages')->where('id', $id)->first();
        return view('messages.show', compact('message'));
    }

    public function edit(string $id)
    {
        $message = DB::table('messages')->where('id', $id)->first();
        return view('messages.edit', compact('message'));
    }

    public function update(CreateMessageRequest $request, string $id)
    {
        $data = $request->validated();

        DB::table('messages')->where('id', $id)->update([
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "mensaje" => $request->input('mensaje'),
            "updated_at" => Carbon::now()
        ]);

        return redirect()->route('messages.index');
    }

    public function destroy(string $id)
    {
        DB::table('messages')->where('id', $id)->delete();
        return redirect()->route('messages.index');
    }
}
