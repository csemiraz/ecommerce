<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SubscriberController extends Controller
{
    public function index() {
        $subscribers = Subscriber::latest()->get();
        return view('back-end.admin.subscriber.index', compact('subscribers'));
    }

    public function store(Request $request) {
        $request->validate([
            'email'=>'required|unique:subscribers|email'
        ]);
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        
        Toastr::success('Thanks for your subscription', ':) Success');
        return redirect()->back();
    }

    public function destroy($id) {
        $subscriber = Subscriber::find($id)->first();
        $subscriber->delete();
        Toastr::success('Subscirber info deleted.', ':) Success');
        return redirect()->back();
    }
}
