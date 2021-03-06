<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use App\Profilehistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    
    public function add()
    {
        return view('admin.profile.create');
    }
    
    
    public function create(Request $request)
    {
    $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      

      // データベースに保存する
      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile/create');
    }
    

      public function index(Request $request)
  {
    
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          $posts = Profile::where('name', $cond_name)->get();
      } else {
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
      
      
  }
  
  public function edit(Request $request)
  {
    
    //news modelからデータを取得
    $profile = Profile::find($request->id);
    if (empty($profile)) {
        abort(404);    
      }
    
    return view('admin.profile.edit',['profile_form' => $profile]);
  } 
  
    public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      unset($profile_form['_token']);
      unset($profile_form['remove']);
        $profile->fill($profile_form)->save();
        $profilehistory = new Profilehistory;
        $profilehistory->profile_id = $profile->id;
        $profilehistory->edited_at = Carbon::now();
        $profilehistory->save();
      
      
      return redirect('admin/profile/');
  }
  
      public function delete(Request $request)
  {
      // 該当するProfile Modelを取得
      $profile = Profile::find($request->id);
      $profile->delete();
      return redirect('admin/profile/');
  }  

}