<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Theme;
use App\Models\Category;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    public function index(){
        $latest_news = News::latest()->where('status',1)->take(3)->get();
        $news_latest =  News::latest()->where('status',1)->paginate(4);
        $categories = Category::where('status',1)->where('parent_id',0)->get();
        $categories_news_view = News::orderBy('view_count','DESC')->take(5)->get();
        $popular_news= News::where('status',1)->orderBy('view_count','DESC')->take(4)->get();
        $recent_news= News::latest()->where('status',1)->take(4)->get();
        $social = Social::first();



        return view('index',compact('latest_news','news_latest','categories','categories_news_view','popular_news','recent_news','social'));
    }
    // news single page
    public function newsSingle($slug){
        $news_detail = News::where('slug',$slug)->first();


        $newskey = 'news_'. $news_detail->id;
        if(!Session::has($newskey)){
            $news_detail->increment('view_count');
            Session::put($newskey,1);
        }
        $related_news = News::where('category_id', '=', $news_detail->category_id)->where('id','!=',$news_detail->id)->take(3)->get();
        return view('newsSingle',compact('news_detail','related_news'));

    }
}
