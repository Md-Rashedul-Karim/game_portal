<?php
namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Gamepost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

       public function about()
    {

        return view('frontend.about');
    }
    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }
    public function contact()
    {
        return view('frontend.contact');
    }

    public function send(Request $request)
    {
        try {
            // Validation
            $validated = $request->validate([
                'name'    => 'required|string|max:255',
                'company' => 'required|string|max:255',
                'email'   => 'required|email',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:2000',
            ]);

            // Send Mail
            Mail::to("game@games.b2mwap.com")->send(new ContactMail($validated));
            // Mail::to("game@games.b2mwap.com")->cc("7bTbG@example.com")->send(new ContactMail($validated));

            return back()->with("success", "Your message has been sent successfully!");
        } catch (\Exception $e) {
            return back()->with("error", "An error occurred: " . $e->getMessage());
        }
    }
}
