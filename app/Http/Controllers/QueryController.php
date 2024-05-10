<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query; // Import the Query model
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class QueryController extends Controller
{

    public function showQueryForm()
    {
        return view('users.query_submission');
    }
    
    public function submitQuery(Request $request)
    {
        $request->validate([
            'query_text' => 'required|string',
        ]);

        $query = new Query();
        $query->user_id = Auth::id();
        $query->query_text = $request->input('query_text');
        $query->save();

        return redirect()->back()->with('success', 'Query submitted successfully.');
    }

    public function showQueries()
    {
        
        try {
            // Get queries submitted by users with usertype 'user'
            $queries = Query::with('user')
                ->whereHas('user', function ($query) {
                    $query->where('usertype', 'user');
                })
                ->whereNotNull('admin_id')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('admin.query_management', compact('queries'));
        } catch (ModelNotFoundException $e) {
            // Handle exception, e.g., log error, display error message, etc.
            return response()->view('errors.404', [], 404);
        }
    }

    public function replyQuery(Request $request, $id)
    {
        $request->validate([
            'reply_text' => 'required|string',
        ]);

        $query = Query::findOrFail($id);
        $query->admin_id = Auth::id();
        $query->reply_text = $request->input('reply_text');
        $query->save();

        return redirect()->back()->with('success', 'Reply sent successfully.');
    }
}