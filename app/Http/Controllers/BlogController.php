<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    private $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];
    private $blogListRoute = '/blogs';
    public function blogs(Request $request)
    {
        return view('blogs.blogs', ['blogs' => Blog::getBlogList($request->all()), 'blogStatuses' => $this->statuses]);
    }

    public function addBlog()
    {
        $blog = new Blog;
        return view('blogs.blog-form', ['blog' => $blog]);
    }

    public function editBlog($id)
    {
        $blog = Blog::getBlogById($id);
        if (empty($blog))
            abort(404);
        return view('blogs.blog-form', ['blog' => $blog]);
    }

    public function saveBlog(Request $request)
    {
        $rules =  [
            'title' => 'required|min:2|max:512|unique:blogs,title,' . $request->get('id'),
            'description' => 'required|min:2',
            'status' => 'required',
        ];
        $messages = [
            'title.required' => 'Please enter a title',
            'title.min' => 'Title should be minimum of 2 characters',
            'title.max' => 'Title should be maximum of 512 characters',
            'title.unique' => 'Blog with same title is already exist!',
            'description.required' => 'Please enter description',
            'description.min' => 'Description should be minimum of 2 characters',
            'status.required' => 'Please select a status',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            return redirect()->back()->withError($errorMessage)->withInput();
        }

        if (!empty($request->get('id'))) {
            $blog = Blog::getBlogById($request->get('id'));
            if (empty($blog))
                abort(404);
            $redirect = [
                'url' => redirect()->back(),
                'msg' => 'Blog updated successfully'
            ];
        } else {
            $blog = new Blog;
            $redirect = [
                'url' => redirect($this->blogListRoute),
                'msg' => 'Blog created successfully'
            ];
        }

        $blog->title = trim($request->get('title'));
        $blog->description = trim($request->get('description'));
        $blog->status = $request->get('status');
        try {
            $blog->save();
            return $redirect['url']->with('success', $redirect['msg']);
        } catch (\Exception $e) {
            echo ($e->getMessage());
            exit;
            return redirect()->back()->withError('Something went wrong please try again later');
        }
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        if (empty($blog))
            abort(404);
        try {
            $blog->delete();
            return redirect()->back()->with('success', 'Blog has been deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Something went wrong please try again later');
        }
    }
}
