<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Image;

class NewsController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page','news');
        $news = News::latest()->get();
        return view('admin.news.index',compact('news'));
    }

    // Add News

    public function add(){
        Session::put('admin_page','news');

        // Showing Categories and sub categories Drop down

        $categories = Category::where(['parent_id' => 0])->where('status' ,1)->get();
        $categories_dropdown = "<option selected disabled>Select Category</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='". $cat->id ."'>". $cat->category_name ."</option>";
            $sub_categories = Category::where(['parent_id'=> $cat->id])->get();
            foreach($sub_categories  as $sub_cat){
                $categories_dropdown .= "<option value ='" . $sub_cat->id ."'> &nbsp; &nbsp; ----".$sub_cat->category_name ."</option>";
            }
        }
        return view('admin.news.add',compact('categories','categories_dropdown'));
    }
    // Store News
    public function store(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            'news_title' => 'required|max:255',
            'category_id' => 'required',
            'news_content' => 'required',
            'image' => 'required'

        ]);
        $news = new  News();
        $news->news_title = $data['news_title'];
        $news->slug = Str::slug($data['news_title']);
        $news->category_id = $data['category_id'];
        $news->news_content = $data['news_content'];

        $current_user = Auth::guard('admin')->user();
        $user_id = $current_user->id;
        $news->admin_id = $user_id;

        $news->seo_title = $data['seo_title'];
        $news->seo_subtitle = $data['seo_subtitle'];
        $news->seo_keywords = $data['seo_keywords'];
        $news->seo_description = $data['seo_description'];



        if($request->hasFile('image')){
            $destination_path ='public/uploads';
          $image =$request->file('image');
          $image_name =$image->getClientOriginalName();
          $path =$request->file('image')->storeAs($destination_path,$image_name);
          $news['image'] = $image_name;
            // }
        }
        if(empty($data['status'])){
            $news->status = 0;
        } else {
            $news->status = 1;
        }

        $news->save();
        Session::flash('success_message', 'News Has Been Added Successfully');
        return redirect()->back();
    }

    // news edit
    public function edit($id){
        Session::put('admin_page','news');
        $news = News::findOrFail($id);
        $categories = Category::where(['parent_id' => 0])->where('status' ,1)->get();
        $categories_dropdown = "<option selected disabled>Select Category</option>";
        foreach($categories as $cat){
            if($cat->id == $news->category_id){
                $selected = "selected";
            }else{
                $selected ="";
            }
            $categories_dropdown .= "<option value='". $cat->id ."' ".$selected.">". $cat->category_name ."</option>";
            $sub_categories = Category::where(['parent_id'=> $cat->id])->get();
            foreach($sub_categories  as $sub_cat){
                if($sub_cat->id == $news->category_id){
                    $selected = "selected";
                }else{
                    $selected ="";
                }
                $categories_dropdown .= "<option value ='" . $sub_cat->id ."' ".$selected."> &nbsp; &nbsp; ----".$sub_cat->category_name ."</option>";
            }
        }
        return view('admin.news.edit',compact('news','categories_dropdown'));
    }

    // update News
    public function update(Request $request,$id){
        $data = $request->all();
        $validateData = $request->validate([
            'news_title' => 'required|max:255',
            'category_id' => 'required',
            'news_content' => 'required',


        ]);
        $news = News::findOrFail($id);
        $news->news_title = $data['news_title'];
        $news->slug = Str::slug($data['news_title']);
        $news->category_id = $data['category_id'];
        $news->news_content = $data['news_content'];

        $current_user = Auth::guard('admin')->user();
        $user_id = $current_user->id;
        $news->admin_id = $user_id;

        $news->seo_title = $data['seo_title'];
        $news->seo_subtitle = $data['seo_subtitle'];
        $news->seo_keywords = $data['seo_keywords'];
        $news->seo_description = $data['seo_description'];



        if($request->hasFile('image')){
        $destination_path ='public/uploads';
          $image =$request->file('image');
          $image_name =$image->getClientOriginalName();
          $path =$request->file('image')->storeAs($destination_path,$image_name);
          $news['image'] = $image_name;
            // }
        }
        if(empty($data['status'])){
            $news->status = 0;
        } else {
            $news->status = 1;
        }

        $news->save();
        $destination_path='/public/uploads';
        if(!empty($data['image'])){
            if(file_exists($destination_path.$news->image)){
                unlink($destination_path.$data['current_image']);
            }
        }

        Session::flash('success_message', 'News Has Been Updated Successfully');
        return redirect()->back();

    }
    public function delete($id){
        $news = News::findOrFail($id);
        $news->delete();
        $image_path = 'public/uploads/news/';

        if(!empty($news->image)){
            if(file_exists($image_path.$news->image)){
                unlink($image_path.$news->image);
            }
        }
        Session::flash('success_message','News has been Deleted Successfully');
            return redirect()->back();
    }

}

