<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Validator; //バリデーションを使えるようにする

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {      //バリデーション
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:125',
            'lastname' => 'required|max:125',
            'gender' => 'required',
            'email' => 'required|email|max:255',
            'postcode' => ['required','regex:/^\d{3}-\d{4}$/','size:8'],
            'address' => 'required|max:255',
            'building_name' => 'nullable|max:255',
            'opinion' => 'required|max:120'
        ],[
            'postcode.regex' => '郵便番号はハイフンありの8桁で入力してください',
        ]); 
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect()
                ->route('contacts.index')
                ->withInput()
                ->withErrors($validator);
        }
        $contacts = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];
        return view('contacts.confirm',$contacts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //フォームから受け取ったactionの値を取得
        $action = $request->action;
        $inputs = [
           'firstname' => $request->firstname,
           'lastname' => $request->lastname,
           'gender' => $request->gender,
           'email' => $request->email,
           'postcode' => $request->postcode,
           'address' => $request->address,
           'building_name' => $request->building_name,
           'opinion' => $request->opinion,
       ];
       //actionの値で分岐
       if( $action == "修正する"){
           return redirect()
               ->route('contacts.index')
               ->withInput($inputs);
       } else{
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:125',
            'lastname' => 'required|max:125',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => ['required','regex:/^\d{3}-\d{4}$/','size:8'],
            'address' => 'required|max:255',
            'building_name' => 'nullable|max:255',
            'opinion' => 'required|max:120'
        ],[
            'postcode.regex' => '郵便番号はハイフンありの8桁で入力してください',
        ]); 
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect()
                ->route('contacts.index')
                ->withInput()
                ->withErrors($validator);
        }
           $contacts = new Contact;
           $contacts->fullname = $request->firstname.$request->lastname;
           $contacts->gender = $request->gender;
           $contacts->email = $request->email;
           $contacts->postcode = $request->postcode;
           $contacts->address = $request->address;
           $contacts->building_name = $request->building_name;
           $contacts->opinion = $request->opinion;
           $contacts->save();
           return view('contacts.thanks'); 
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
