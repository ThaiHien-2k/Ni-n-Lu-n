<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Comment;
use App\Product;
   
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['status'] = '2';
        if(auth()->user()->id==1){
            $input['status'] = '1';
        }
        Comment::create($input);
   
        return back();
    }

    public function reply($id)
    {     
        return redirect()->route('product.show', [$id]);
    }


    public function replied($id)
    {     
        $comment = Comment::find($id)->update(['status' => '2']);

        return redirect()->route('admin.comment');
    }

    public function remove($id)
    {
        Comment::where('id',$id)->delete();
           return redirect()->route('admin.comment')->with('success','Xóa sản phẩm thành công!');
    }
}