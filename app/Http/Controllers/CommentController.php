<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Tintuc;
class CommentController extends Controller
{
    //
    public function getXoa($id,$idTintuc){
        $comment=comment::find($id);
        $comment->delete();
        return redirect('admin/tintuc/sua/'.$idTintuc)->with('xoacomment','Xoas comment thành công');
    }
}
