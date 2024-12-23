<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutVarn;
use App\Models\Additional;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Client;
use App\Models\Conclusion;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Information;
use App\Models\Language;
use App\Models\Partnership;
use App\Models\PartnershipAdditional;
use App\Models\Post;
use App\Models\Service;
use App\Models\Specialist;
use App\Models\SubService;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function home($lang = 'ru')
    {
        if ($lang) {
        session(['lang' => $lang]);
        App::setLocale($lang);
        }
        $partnerships = Partnership::all();
        $testimonials = Testimonial::all();
        $banner = Banner::latest()->first();
        $contact = Contact::latest()->first();
        $about_varn = AboutVarn::latest()->first();
        $services = Service::latest()->take(3)->get();
        $posts = Post::where('status', 1)->latest()->take(6)->get();
        $postIds = $posts->pluck('id');
        $specialists = Specialist::where('status', 1)->take(5)->get();

        $posts_also = Post::where('status', 1)
            ->whereNotIn('id', $postIds)
            ->latest()
            ->take(8)
            ->get();
        return view('front.home', compact('banner', 'contact', 'about_varn', 'services', 'posts', 'posts_also', 'testimonials', 'partnerships', 'specialists'));
    }

    public function about($lang)
    {
        if ($lang) {
            session(['lang' => $lang]);
            App::setLocale($lang);
        }
        $abouts = About::all();
        return view('front.about', compact('abouts'));
    }

    public function partnership()
    {
        $lang = App::getLocale();
        $id = Language::where('name', $lang)->first()->id;
        $partnerships = Partnership::all();
        $top_button = PartnershipAdditional::where('lang_id', $id)->latest()->first();
        return view('front.partnership', compact('top_button', 'partnerships'));


    }

    public function gallery()

    {
        $galleries = Gallery::paginate(9);

        $currentPage = $galleries->currentPage();

        $lastPage = $galleries->lastPage();

        $start = max(1, $currentPage - 2);
        $end = min($lastPage, $currentPage + 2);

        return view('front.gallery', compact('galleries', 'start', 'currentPage', 'end'));
    }

    public function galleryDetail( $lang, $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('front.gallery-detail', compact('gallery'));
    }

    public function service($lang, $slug)
    {

        $locale = App::getLocale();
        $service = Service::where("slug->$locale", $slug)->first();

        if (!$service) {
            abort(404);
        }

        return view('front.service', compact('service'));
    }


    public function getSubServiceDetails($id)
    {
        $subService = SubService::find($id);
//        dd($subService);
        if ($subService) {
            return response()->json([
                'name' => $subService->name,
                'description' => $subService->description,
            ]);
        }

        return response()->json(['message' => 'Ma\'lumot topilmadi'], 404);
    }


    public function category($lang, $id)
    {
        $category = Category::findOrFail($id);
        $posts = Post::where('category_id', $id)->paginate(8);

        $currentPage = $posts->currentPage();

        $lastPage = $posts->lastPage();

        $start = max(1, $currentPage - 2);
        $end = min($lastPage, $currentPage + 2);
        return view('front.category', compact('category', 'posts', 'currentPage', 'start', 'end'));

    }


    public function post($lang, $id)
    {

        $post = Post::findOrFail($id);
        $post->increment('view_count');
        $posts = Post::where('id', '!=', $id)->latest()->take(6)->get();
        $categories = Category::all();
        return view('front.post', compact('post', 'posts', 'categories'));
    }


    public function contact()
    {
        $contact = Contact::latest()->first();
        return view('front.contact', compact('contact'));
    }


    public function submit(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $message = $request->input('message');

        $botToken = '7877868203:AAGSOiiKwnBcK9eMMmlIlHWZ2iYRxRsRJJ4';
        $chatId = '-1002333445011';

        // Matnni tayyorlash
        $text = "Foydalanuvchidan yangi xabar:\n\n" .
            "Ismi: $name\n" .
            "Email manzili: $email\n" .
            "Telefon  raqami: $phone\n" .
            "Xabar: $message";

        // Telegram API URL
        $apiURL = "https://api.telegram.org/bot$botToken/sendMessage";

        // Curl orqali so'rov yuborish
        $data = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML'
        ];

        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        // Xato xabarini tekshirish
        if ($result === FALSE) {
            // Xato xabarini ko'rsatish
            return redirect()->back()->with('error', 'Error sending message');
        } else {
            return redirect()->back()->with('success', 'Your message has been sent!');
        }
    }


    public function client()
    {
        $lang = App::getLocale();
        $id = Language::where('name', $lang)->first()->id;
        $clients = Client::all()->where('lang_id', $id);
        return view('front.client', compact('clients'));
    }


    public function specialist()
    {
        $additional = Additional::latest()->first();
        $specialists = Specialist::all();
        return view('front.specialist', compact('specialists', 'additional'));
    }


    public function conclusion()
    {
        $conclusions = Conclusion::all();
        return view('front.conclusion', compact('conclusions'));
    }



    public function service_footer()
    {
        $services = Service::latest()->take(3)->get();
        return view('front.uslugi', compact('services'));
    }
    public function information()
    {
        $lang = App::getLocale();
        $id = Language::where('name', $lang)->first()->id;

        // Get the latest information record where 'lang-id' matches the current language ID
        $information = Information::where('lang-id', $id)->latest()->first();

        return view('front.information', compact('information'));
    }

}
