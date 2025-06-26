<?php

namespace App\Http\Controllers;

use App\Models\CommunityPost;
use App\Models\CommunityReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        $query = CommunityPost::with(['user', 'replies.user'])->latest();
    
        if (request('search')) {
            $query->where('content', 'like', '%' . request('search') . '%');
        }
    
        $posts = $query->get();
    
        return view('komunitas.index', compact('posts'));
    }
    

    public function storePost(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('community_images', 'public');
        }

        CommunityPost::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect()->route('community.index')->with('success', 'Postingan berhasil dikirim!');
    }

    public function storeReply(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('community_images', 'public');
        }
    
        CommunityReply::create([
            'community_post_id' => $postId,
            'user_id' => Auth::id(),
            'content' => $request->content,
            'image' => $imagePath
        ]);
    
        return redirect()->route('community.index')->with('success', 'Balasan berhasil dikirim!');
    }

    public function editPost($id)
    {
        $post = CommunityPost::findOrFail($id);

        // Pastikan hanya pemilik post atau admin yang boleh edit
        if (auth()->id() !== $post->user_id) {
            abort(403);
        }

        return view('komunitas.edit', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $post = CommunityPost::findOrFail($id);

        if (auth()->id() !== $post->user_id) {
            abort(403);
        }

        $request->validate([
            'content' => 'required|string',
        ]);

        $post->update(['content' => $request->content]);

        return redirect()->route('community.index')->with('success', 'Postingan berhasil diperbarui.');
    }

    public function destroyPost($id)
    {
        $post = CommunityPost::findOrFail($id);

        if (auth()->id() !== $post->user_id) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('community.index')->with('success', 'Postingan berhasil dihapus.');
    }
    public function editReply($id)
    {
        $reply = \App\Models\CommunityReply::findOrFail($id);

        if (auth()->id() !== $reply->user_id) {
            abort(403);
        }

        return view('komunitas.edit_reply', compact('reply'));
    }

    public function updateReply(Request $request, $id)
    {
        $reply = \App\Models\CommunityReply::findOrFail($id);

        if (auth()->id() !== $reply->user_id) {
            abort(403);
        }

        $request->validate([
            'content' => 'required|string',
        ]);

        $reply->update(['content' => $request->content]);

        return redirect()->route('community.index')->with('success', 'Komentar berhasil diperbarui.');
    }

    public function destroyReply($id)
    {
        $reply = \App\Models\CommunityReply::findOrFail($id);

        if (auth()->id() !== $reply->user_id) {
            abort(403);
        }

        $reply->delete();

        return redirect()->route('community.index')->with('success', 'Komentar berhasil dihapus.');
    }

}
