<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gamepost;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamepostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(); // সব category আনবো
        $gameposts  = Gamepost::orderBy('id', 'desc')->paginate(10);

        return view('backend.game.index', compact('gameposts', 'categories'));
    }

    public function dashboard()
    {
        return view('backend.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gamepost   = new Gamepost();
        $categories = Category::all(); // সব category আনবো

        return view('backend.game.create', compact('gamepost', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_title'      => 'required|string|max:255',
            'game_image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'game_url'        => 'nullable|url',
            'game_genres'     => 'nullable|string|max:255',
            'game_platform'   => 'nullable|string|max:255',
            'game_status'     => 'required|string|max:50',
            'game_publish_at' => 'nullable|date',
        ]);

        $data            = $request->all();
        $data['user_id'] = auth()->id();

        // Image upload
        if ($request->hasFile('game_image')) {
            $imageName = time() . '.' . $request->game_image->extension();
            $request->game_image->move(public_path('uploads/games'), $imageName);
            $data['game_image'] = $imageName;
        }

        Gamepost::create($data);

        return redirect()->route('games.index')
            ->with('success', 'Game added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id = null)
    {
        $gamepost   = Gamepost::find($id);
        $categories = Category::all(); // সব category আনবো
        return view('backend.game.edit', compact('gamepost', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
// Method 1: Update only validated fields (Recommended)
    public function update(Request $request, $id)
    {

        $request->validate([
            'game_title'      => 'required|string|max:255',
            'game_image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'game_url'        => 'nullable|url',
            'game_genres'     => 'nullable|string|max:255',
            'game_platform'   => 'nullable|string|max:255',
            'game_status'     => 'required|string|max:50',
            'game_publish_at' => 'nullable|date',
        ]);

        $gamepost        = Gamepost::findOrFail($id);
        $data            = $request->except(['_token', '_method']);
        $data['user_id'] = auth()->id();

        // Handle image upload
        if ($request->hasFile('game_image')) {
            if ($gamepost->game_image) {
                $oldImagePath = public_path('uploads/games/' . $gamepost->game_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = time() . '.' . $request->game_image->extension();
            $request->game_image->move(public_path('uploads/games'), $imageName);
            $data['game_image'] = $imageName;
        }

        DB::table('gameposts')->where('id', $id)->update($data);

        return redirect()->route('games.index')
            ->with('success', 'Game updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gamepost $gamepost)
    {
        if ($gamepost->game_image && file_exists(public_path('uploads/games/' . $gamepost->game_image))) {
            unlink(public_path('uploads/games/' . $gamepost->game_image));
        }

        $gamepost->delete();

        return redirect()->route('games.index')
            ->with('success', 'Game deleted successfully.');
    }
}
