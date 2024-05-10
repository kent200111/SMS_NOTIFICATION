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

    // Split user's input into individual words
    $userWords = explode(' ', $userQuestion);

    // Retrieve all FAQs
    $faqs = Faq::all();

    // Loop through FAQs to find a match
    foreach ($faqs as $faq) {
        // Check if any word in the user's input matches the FAQ question
        foreach ($userWords as $word) {
            if (stripos($faq->question, $word) !== false) {
                // If a match is found, set the bot's answer and break the loop
                $botAnswer = $faq->answer;
                break 2; // break both foreach loops
            }
        }
    }

    return response()->json(['answer' => $botAnswer]);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = ChatBot::orderBy('created_at', 'desc')->get();

        return view('ChatBot.index')->with('faqs', $faqs);
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
        $chatbot = ChatBot::findOrFail($request->id);
        $chatbot->question = $request->question;
        $chatbot->answer = $request->answer;
        $chatbot->save();

        return redirect('chatbot')->with('flash_message', 'Query Updated! ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the ChatBot record by its ID
        $chatbot = ChatBot::findOrFail($id);

        // Delete the ChatBot record
        $chatbot->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('chatbot.index')->with('success', 'Query deleted successfully');
    }
}