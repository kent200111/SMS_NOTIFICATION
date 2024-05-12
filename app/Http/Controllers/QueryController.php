<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
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
            $queries = Query::with('user')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('admin.query_management', compact('queries'));
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404);
        }
    }

    public function getQueryDetails($queryId)
    {
        $query = Query::findOrFail($queryId);
        return view('admin.query_details', compact('query'));
    }

    // public function badgeQueries()
    // {
    //     $unrepliedCount = Query::whereNull('reply_text')->count();
    //     return view('admin_dashboard.adminhome', compact('unrepliedCount'));
    // }

    public function showUserQueries()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();
    
        // Retrieve queries belonging to the current user
        $queries = Query::with('user')
                        ->where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();
    
        // Pass the filtered queries to the view
        return view('users.query_submission', compact('queries'));
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