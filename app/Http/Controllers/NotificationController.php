<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;


class NotificationController extends Controller
{


    public function index()
    {

        $notifications = auth()->user()
            ->notifications()
            ->latest()
            ->get();


        return view(
            'notifications.index',
            compact('notifications')
        );

    }



    public function read($id)
    {

        $notification = Notification::findOrFail($id);


        $notification->update([

            'dibaca' => true

        ]);


        return back();

    }



    public function readAll()
    {

        auth()->user()
            ->notifications()
            ->update([

                'dibaca'=>true

            ]);


        return back();

    }


}