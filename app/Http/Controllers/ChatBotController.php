<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatBot;
use App\Models\Faq;


class ChatBotController extends Controller
{
    public function respond(Request $request)
    {
        $userQuestion = strtolower($request->input('userQuestion'));
        $botAnswer = "I am sorry, I don't know the answer to that.";

        $faq = Faq::where('question', 'like', '%' . $userQuestion . '%')->first();
        if ($faq) {
            $botAnswer = $faq->answer;
        }

        return response()->json(['answer' => $botAnswer]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = ChatBot::all();
        return view ('ChatBot.index')->with('faqs',$faqs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('ChatBot.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        ChatBot::create($input);
        return redirect('chatbot')->with('flash_message', 'Query Added! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
