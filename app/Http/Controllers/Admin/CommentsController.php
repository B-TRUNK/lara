<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Admin\Comment;
use Auth;
use App\User;
class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('created_at' ,'desc')->paginate(2);
        return view('admin.comments.display')->with('comments', $comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        //insert form data into db
        Comment::create([

            //Belongs To Relationship
            //'name'          => $request->name,
            'user_id'         => Auth::user()->id,

            'comment'       => $request->comment,

        ])->save();

            return redirect()->back()->with(['success' => 'Data Stored Successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Comment::where('id' ,$id)->get();
        $comment = Comment::find($id);
        return view('admin.comments.displaysingle')->with('comment' , $comment);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('admin.comments.update')->with('comment' ,$comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $comment -> name    = $request -> name;
        $comment -> comment = $request -> comment;

        $comment->update();
        $comment->save();

        return redirect(route('comments.index'))->with(['successfulUpdae' => 'Updated Successfully!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->destroy($id);
        return redirect(route('comments.index'))->with(['deleted'=> "Deleted Successfully!"]);
    }

    public function sdeletes()
    {
        return Comment::onlyTrashed()->get();
    }

    public function user_profile($id)
    {

        $user_id = User::find($id);
            return view('admin.comments.userprofile')->with('user_id' ,$user_id);

    }
}
