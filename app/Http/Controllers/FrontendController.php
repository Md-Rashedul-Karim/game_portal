<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gamepost;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gameposts   = Gamepost::all();
        $categories  = Category::all();
        $gameBanners = Gamepost::where('game_banner', 'active')->get();
        return view('frontend.index', compact('gameposts', 'categories', 'gameBanners'));
    }

    /**
     * Display a listing of the resource.
     */
    public function categories()
    {
        // Category এর সাথে তার gameposts ও নিয়ে আসব
        $categories = Category::with('gameposts')->get();
        return view('frontend.categories', compact('categories'));

    }

    public function category($id = null)
    {
        $category  = Category::findOrFail($id);
        $gameposts = Gamepost::where('category_id', $id)->get();
        return view('frontend.category', compact('category', 'gameposts'));
    }

    /**
     * Display the specified resource.
     */
    public function showgame($id = null)
    {

        $gamepost = Gamepost::findOrFail($id);
        $category = Category::with('gameposts')->get();
        return view('frontend.game-details', compact('gamepost', 'category'));
    }
}
