<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\SemaphoreService;
use Illuminate\Support\Facades\DB;
use App\Models\SmsNotification;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $semaphoreService;

    public function __construct(SemaphoreService $semaphoreService)
    {
        $this->semaphoreService = $semaphoreService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index')->with('posts', $posts);
    }

    public function showAdminHome()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin_dashboard.adminhome', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
            'send_sms' => 'nullable|in:1', // Ensure send_sms is either null or '1'
        ]);

        $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $photoPath = '/storage/' . $path;

        if ($path) {
            $requestData = $request->all();
            $requestData['photo'] = $photoPath;
            $post = Post::create($requestData);

            if ($request->input('send_sms') == '1') {
                // If send_sms is '1', send the caption through SMS
                $messageContent = $request->input('caption'); // Assuming 'caption' is the field containing the message content
                $adminName = Auth::user()->first_name . ' ' . Auth::user()->last_name; // Combine first name and last name
                $this->sendSMS($messageContent, $adminName);
            }

            return redirect('post')->with('flash_message', 'Post Added!');
        } else {
            return redirect()->back()->withInput()->withErrors(['photo' => 'Failed to upload photo.']);
        }
    }

    /**
     * Send the SMS.
     */
    protected function sendSMS($messageContent, $adminName)
    {
        // Retrieve all users with non-empty contact numbers
        $users = DB::table('users')->whereNotNull('contact_number')->get();

        foreach ($users as $user) {
            // Use SemaphoreService to send SMS
            $response = $this->semaphoreService->sendMessage($user->contact_number, $messageContent);

            // Store in database using SmsNotification model
            SmsNotification::create([
                'admin_name' => $adminName,
                'message' => $messageContent,
            ]);
        }
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
    public function destroy($id)
    {
        // Find the post by its ID
        $post = Post::findOrFail($id);
    
        // Delete the post
        $post->delete();
    
        // Redirect back to the index page with a success message
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }    
}