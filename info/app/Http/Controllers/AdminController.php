<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Validator; //バリデーションを使えるようにする
use Carbon\Carbon;

class AdminController extends Controller
{
    //お問合せ一覧リストを表示
    public function index()
    {
        $contacts = Contact::select('id', 'created_at', 'fullname', 'gender', 'email', 'opinion')
            ->paginate(10);
        return view('admin.index', ['contacts' => $contacts]);
    }
    //検索機能
    public function search(Request $request)
    {  
        //バリューの値がリセットだったらadmin.indexに戻しリフレッシュさせる
        $action = $request->action;
        if ($action == "リセット") {
            return redirect()
                ->route('admin.index');
        } else {
           //------バリデーションロジッックstart-------------------//
           /*--やりたいこと---
           1:終了日が開始日よりも過去の日付であった場合エラー
           2:開始日と終了日と同日日でもエラー
           3：開始日に入力はあるが、終了日入力がなかった場合エラー
           4：開始日に入力はないが、終了日に入力があった場合エラー
           */
           $validator = Validator::make($request->all(), [
            'date2' => 'nullable|required_with:date1|after:date1',
            'date1' => 'nullable|required_with:date2',
            
        ]); 
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect()
                ->route('admin.index')
                ->withInput()
                ->withErrors($validator);
        }



           //-----バリデーションロジックend------------------//

            //--------------検索機能のロジック開始-----------------//
            $query = Contact::query();
            //$contacts = Contact::where('fullname','LIKE',"%{$request->fullname}%")->get();
            //$contacts = Contact::where('updated_at','LIKE',"%{$request->gender}%")->get();
            //$contacts = Contact::where('gender','LIKE',"%{$request->date1}%")->get();
            //$contacts = Contact::where('email','LIKE',"%{$request->date2}%")->get();
            //$contacts = Contact::where('','LIKE',"%{$request->email}%")->get();
            $fullname = $request->fullname;
            $gender = $request->gender;
            $date1 = $request->date1;
            $date2 = $request->date2;
            $email = $request->email;
            

            if (!empty($fullname)) {
                $query->where('fullname', 'like', '%' . $fullname . '%');
            }
            if (!empty($gender)) {
                $query->where('gender', 'like', '%' . $gender . '%');
            }

            if (!empty($email)) {
                $query->where('email', 'like', '%' . $email . '%');
            }
            //日付が選択されたら
            if (!empty($date1) && !empty($date2)) {
                //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
                $date1carbon = Carbon::createFromFormat('Y-m-d', $date1)->setTime(00,00,00);
                $date2carbon = Carbon::createFromFormat('Y-m-d', $date2)->setTime(23,59,59); 
                $query->whereBetween('created_at', [$date1carbon, $date2carbon]);
            }
            $contacts = $query->paginate(10);


            return view('admin.index', ['contacts' => $contacts]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Contact $contact)
    {
        $contact->delete();
        return redirect('/admin');
    }
}
