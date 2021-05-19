<?php

namespace App\Http\Controllers;

use App\Category;
use App\Notifications\sendContactEmail;
use App\Portfolio;
use App\Tag;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class WelcomeController extends Controller
{

    public function home($locale)
    {
         $pageurl = '/';
        \App::setLocale($locale);

        return view('index', ['pageurl' => $pageurl]);
    }
    public function about($locale)
    {
         $pageurl = '/about';
        \App::setLocale($locale);

        return view('about', ['pageurl' => $pageurl]);
    }
    public function services($locale)
    {
         $pageurl = '/services';
        \App::setLocale($locale);

        return view('services', ['pageurl' => $pageurl]);
    }
    public function portfolio($locale)
    {
         $pageurl = '/portfolio';
        \App::setLocale($locale);

        return view('portfolio', ['pageurl' => $pageurl]);
    }
    public function portfolio_details($locale, Portfolio $portfolio)
    {
        $pageurl = '/portfolio/'.$portfolio->id;
        \App::setLocale($locale);

        return view('portfolio_detail', ['pageurl' => $pageurl, 'portfolio' => $portfolio]);
    }

    public function clients($locale)
    {
         $pageurl = '/clients';
        \App::setLocale($locale);

        return view('clients', ['pageurl' => $pageurl]);
    }
    public function contactpage($locale)
    {
         $pageurl = '/contact';
        \App::setLocale($locale);

        return view('contact', ['pageurl' => $pageurl]);
    }

    public function index($locale)
    {
        $pageurl = '/blog';
        \App::setLocale($locale);

        $search = request()->query('search');

        $posts = Post::searched()->orderBy('published_at', 'desc')->simplePaginate(10);

        return view('blog.blog_list')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', $posts)
            ->with('pageurl', $pageurl);
    }

    public function category ($locale, Category $category)
    {
        $pageurl = '/blog/category/'.$category;
        \App::setLocale($locale);

        return view('blog.blog_list')
        ->with('categories', Category::all())
        ->with('tags', Tag::all())
        ->with('category', $category)
        ->with('posts', $category->posts()->searched()->simplePaginate(10))
        ->with('pageurl', $pageurl);

    }

    public function tag ($locale, Tag $tag)
    {

        $pageurl = '/blog/tag/'.$tag;
        \App::setLocale($locale);

        $search = request()->query('search');

        return view('blog.blog_list')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('tag', $tag)
            ->with('posts', $tag->posts()->searched()->simplePaginate(10))
            ->with('pageurl', $pageurl);
    }


    public function showPost($locale, Post $post)
    {
        $pageurl = '/blog/post/'.$post;
        \App::setLocale($locale);

        return view('blog.show')
            ->with('post', $post)
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('pageurl', $pageurl);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        try
        {
            $admin = User::first();

            $admin->notify(new sendContactEmail($request->name, $request->email, $request->message));

            session()->flash('success', 'Contact form successfully submitted. Thank you, We will get back to you soon!');
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'An error occurred while trying to send your request. please try again later');
            return redirect()->back();

        }

    }

}
