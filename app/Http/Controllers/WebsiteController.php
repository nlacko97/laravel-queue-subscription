<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeUserWebsiteRequest;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Website::with(['users', 'posts'])->get();
    }

    public function subscribeToWebsite(SubscribeUserWebsiteRequest $request)
    {
        $data = $request->validated();
        $website = Website::find($data['website_id']);
        $subscriptionExists = $website->users()->where('users.id', $data['user_id'])->exists();
        if ($subscriptionExists) {
            return response()->json([
                'code' => 400,
                'message' => 'User is already subscribed to this site!'
            ]);
        }
        $website->users()->attach($data['user_id']);
        return response()->json([
            'code' => 200,
            'message' => 'User subscribed to website!'
        ]);
    }
}
