<?php

namespace App\Http\Controllers;

use App\Http\Resources\postResource;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class postController extends Controller
{
      public function index(){
         //id title (var char),description(text)
         $postsFromDB=Post::all();
         
         
         return postResource::collection($postsFromDB);
      }
// ============================test========================
//  public function index(){
//       //id title (var char),description(text)
//       $postsFromDB=Post::all();
   
   
//        return view('posts.index',['posts'=>$postsFromDB]);
//     }
   // ============================end test========================

      public function show($postId){
         $singlePostFromDB=post::findOrFail($postId);
         
         
         return postResource::make($singlePostFromDB) ;
         // return view('posts.show',['post'=>$singlePostFromDB]);
      }
      public function create(){
         $users=User::all();
         
         return view('posts.create',['users'=>$users]);
      }
      public function store(){

         request()->validate([
            'title'=> ['required',' min:3'],
            'description'=> ['required',' min:5'],
            'post_creator'=> ['required',' exists:users,id'],
            'image'=>['required'],
         ]);
         if (request()->has('image')){
            $file=request()->file('image');
            
            $extension=$file->getClientOriginalExtension();
            $filename=time() .'.'.$extension;
            
            
           $path= Storage::disk('public')->put(  'Images', $file);
            
         }
         //1- get user data
         $data=request()->all();
      
         $title =request()->title;
         $description=request()->description;
         $postCreator=request()->post_creator;
         $image=$path;
         

         //2-store the user data in database

            // $post=new Post;
            // $post->title = $title;
            // $post->description = $description;
            // $post->save();

      $post= post::create([
               'title'=>$title,
               'description'=>$description,
               'image'=>$image,
               'user_id'=>$postCreator,
            ]);
         //3-redirection to posts.index
         return postResource::make($post);
      }
      public function edit(Post $post){//Post $post take the post from database
         
         $users=User::all();
         return view('posts.edit',['users'=>$users,'post'=>$post]);
      }
      public function update($postId){
         request()->validate([
            'title'=> ['required',' min:3'],
            'description'=> ['required',' min:5'],
            'post_creator'=> ['required',' exists:users,id'],
         ]);
         //1- get user data
         $title =request()->title;
         $description=request()->description;
         $postCreator=request()->post_creator;
         
         //2-Update the user data in database
         $singlePostFromDB=post::find($postId);
      $singlePostFromDB->update([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$postCreator,
         ]);
         //3-redirection to posts.show
         //   to_route('posts.show',$postId);
         return postResource::make($singlePostFromDB);
      }
         // ============================test========================
      // public function destroy($postId){
      //    //1-delete the post from database
      // $post = Post::find($postId);
      // $post->delete();
      //    //2 redirect to posts.index 
      //    return  to_route('posts.index');
      // }
   // ============================end test========================
      public function destroy($postId){
         //1-delete the post from database
      $post = Post::find($postId);
      $post->delete();
         //2 redirect to posts.index 
      return  response()->noContent();
      }

}