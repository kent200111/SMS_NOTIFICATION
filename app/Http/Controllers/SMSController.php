<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SemaphoreService;
use Illuminate\Support\Facades\DB;
use App\Models\SmsNotification; 

class SMSController extends Controller
{
    protected $semaphoreService;

    public function __construct(SemaphoreService $semaphoreService)
    {
        $this->semaphoreService = $semaphoreService;
    }

    public function showForm()
    {
        $uniqueNotifications = SmsNotification::all()
        ->unique(function ($item) {
            return $item['admin_name'].$item['message']; // Unique key combining user_id and message
        });

    return view('admin_dashboard.send_sms', compact('uniqueNotifications'));

    }

    public function sendSMS(Request $request)
    {
        // Validate the input
        $request->validate([
            'message' => 'required|string',
            'admin_name' => 'required|string',
        ]);

        $messageContent = $request->input('message');
        $adminName = $request->input('admin_name');

        // Retrieve all users with non-empty contact numbers
        $users = DB::table('users')->whereNotNull('contact_number')->get();

        foreach ($users as $user) {
            // Use SemaphoreService to send SMS
            $response = $this->semaphoreService->sendMessage($user->contact_number, $messageContent);

            // Store in database using SmsNotification model
            SmsNotification::create([
                'admin_name' => $adminName,
                'message' => $messageContent, // Adjust field name if necessary
            ]);
        }

        return back()->with('success', 'SMS sent to all numbers successfully!');
    } 
}