<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Categories;
use App\Http\Requests\BlogPostSaveRequest;
use App\Http\Requests\CategorySaveRequest;
use Session;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $logged_in = $request->session()->get('loginValidated');
        //$posts = Posts::orderBy('id', 'desc')->get();
        $posts = Posts::orderBy('id', 'desc')->simplePaginate(10);
        $categories = Categories::orderBy('name', 'asc')->get();
        $title = 'My Blog';
        echo view('header.header', compact('title'));
        echo view('blog.blog', compact('posts', 'categories', 'logged_in'));
        echo view('footer.footer');
    }


    public function blog_posts($postSlug, Request $request)
    {
        $logged_in = $request->session()->get('loginValidated');

        // if (Posts::where('slug', '=', $postSlug)->count() === 0) {
               //return redirect(url('error'));
        // }

        $post = Posts::whereSlug($postSlug)->with(['users','categories'])->first();
        $title = $post->title;
        echo view('header.header', compact('title'));
        echo view('blog.blogpost', compact('post', 'logged_in'));
        echo view('footer.footer');
    }

    public function dashboard(Request $request)
    {
        if (Session::get('loginValidated') !== 'yes') {
            return redirect(url('/'));
        }
        $user_fname = $request->session()->get('userFname');
        $user_lname = $request->session()->get('userLname');
        $user_full_name = $user_fname.' '.$user_lname;
        $title = 'Blog Dashboard';
        echo view('header.header', compact('title'));
        echo view('blog.admin.dashboard', compact('user_full_name'));
        echo view('footer.footer');
    }


    public function category_blog_posts(Request $request, $category_slug)
    {

        if (Categories::where('slug', '=', $category_slug)->count() === 0) {
            return redirect(url('error'));
        }

        $logged_in = $request->session()->get('loginValidated');
        $category_details = Categories::whereSlug($category_slug)->first();
        $category_id = $category_details->id;
        $category_slug = $category_slug;
        $category_name = $category_details->name;
        $posts = Posts::where('categories_id', $category_id)->with(['users'])->orderBy('id', 'desc')->get();
        $categories = Categories::orderBy('name', 'asc')->get();
        $title = '';
        echo view('header.header', compact('title'));
        echo view('blog.category_blog_posts', compact('category_slug', 'category_name', 'posts', 'categories', 'logged_in'));
        echo view('footer.footer');
    }


    public function admin_blog_posts()
    {
        $posts = Posts::orderBy('id', 'desc')->get();
        $title = '';
        echo view('header.header', compact('title'));
        echo view('blog.admin.blog_posts', compact('posts'));
        echo view('footer.footer');
    }

    public function create_blog_post()
    {
        $categories = Categories::orderBy('name', 'asc')->get();
        $title = '';
        echo view('header.header', compact('title'));
        echo view('blog.admin.create_blog_post', compact('categories'));
        echo view('footer.footer');
    }


    public function save_blog_post(BlogPostSaveRequest $request)
    {
        $validated = $request->validated();
        $blog_content = '';
        $slugExists = 'yes';

        if ($validated) {
            $blog_title = $request->blogTitle;
            $blog_slug = $request->blogSlug;
            $blog_content = $request->blogContent;
            $blog_category = $request->blogCat;
            $blog_snippet = $request->blogSnippet;
            $i = 0;

            do {
                $i = $i + 1;
                if (Posts::where('slug', '=', $blog_slug)->count() === 0) {
                    $slugExists = 'no';
                }
                else {
                    $blog_slug = $blog_slug.'-'.$i;
                }
            } while (Posts::where('slug', '=', $blog_slug)->count() > 0);

            $posts = new Posts;
            $posts->title = $blog_title;
            $posts->slug = $blog_slug;
            $posts->content = $blog_content;
            $posts->created = Date('Y-m-d');
            $posts->users_id = $request->session()->get('userId');
            $posts->categories_id = $blog_category;
            $posts->snipet = $blog_snippet;
            $post_saved = $posts->save();

            if ($post_saved) {
                return redirect()->back()->withSuccess('Blog post saved successfully');
            }
            else {
                return redirect()->back()->withError('There was an error, please try again');
            }
        }
        else {
            return redirect()->back()->withError('You did not provide all the required data');
        }
    }


    public function blog_categories()
    {
        $categories = Categories::orderBy('name', 'asc')->get();
        $title = 'Blog posts based on blog categories';
        echo view('header.header', compact('title'));
        echo view('blog.admin.blog_categories', compact('categories'));
        echo view('footer.footer');
    }

    public function create_blog_category()
    {
        $title = '';
        echo view('header.header', compact('title'));
        echo view('blog.admin.create_blog_category');
        echo view('footer.footer');
    }

    public function save_blog_category(CategorySaveRequest $request)
    {
        $validated = $request->validated();
        $blog_content = '';
        $slug_exists = 'yes';
        $category_slug = '';

        if ($validated) {
            $new_category_name    = $request->catName;
            $new_category_slug = strtolower($new_category_name);
            $new_category_slug_arr = explode(" ", $new_category_slug);

            for ($i=0; $i < count($new_category_slug_arr) ; $i++) {
                if ($category_slug != '') {
                    $category_slug = $category_slug.'-'.$new_category_slug_arr[$i];
                }
                else {
                    $category_slug = $new_category_slug_arr[$i];
                }
            }


            $i = 0;

            do {
                $i = $i + 1;
                if (Categories::where('slug', '=', $category_slug)->count() === 0) {
                    $slug_exists = 'no';
                }
                else {
                    $category_slug = $category_slug.'-'.$i;
                }
            } while (Categories::where('slug', '=', $category_slug)->count() > 0);

            $categories = new Categories;
            $categories->name = $new_category_name;
            $categories->slug = $category_slug;
            $category_saved = $categories->save();

            if ($category_saved) {
                return redirect()->back()->withSuccess('New category saved successfully');
            }
            else {
                return redirect()->back()->withError('There was an error, please try again');
            }
        }
        else {
            return redirect()->back()->withError('You did not provide all the required data');
        }
    }

    public function blog_users()
    {

    }

    public function create_blog_user()
    {

    }


    public function blog_error()
    {
        $title = 'Blog post not found';
        echo view('header.header', compact('title'));
        echo view('blog.blog_error');
        echo view('footer.footer');
    }

}
