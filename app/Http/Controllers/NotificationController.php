<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('index'); // Display the form
    }

    public function submitForm(Request $request)
    {
        $message = $request->input('message');

        // Emit the message to the Socket.IO server
        // Here we use HTTP to send data to our Socket.IO server
        $this->sendNotification($message);

        return redirect()->back()->with('success', 'Message sent!');
    }

    private function sendNotification($message)
    {
        $ch = curl_init('http://localhost:3000/send-notification');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['message' => $message]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }
}
