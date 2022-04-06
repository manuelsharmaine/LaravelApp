<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index() {

        return view('index');
    }

    public function about(){

        $name = 'James Smith';
        $address = 'Sample Address';

        $html = '<h2>SAMPLE</h2>';
        $cars = array("Volvo", "BMW", "Toyota");
        // return view('pages.about', ['name' => 'John Doe']);
        // return view('pages.about')->with('name', 'Jane Doe')->with('address', 'Test Address');
        return view('pages.about', compact('name','address','html','cars'));
    }

    public function checkRequest(Request $request){
        echo 'Path : ' . $request->path() .'<br>';
        echo 'URL: ' . $request->url() .'<br>';
        echo 'Method: ' .$request->method() . '<br>'; 
        echo 'IP: ' . $request->ip() . '<br>';

    }

    public function showContactPage(){
        return view('pages.contact-us');
    }

    public function storeContacts(Request $request){

        $request->validate([
            'message' => 'required',
            'fullname' => 'required',
            'email' => 'required',
        ]);


        $all = $request->all(); //array
            $collect = $request->collect(); //collection
            $input = $request->input(); //array
            $query = $request->query();  

            $fullname = $request->input('fullname'); //input method     
        $email  = $request->email; //dynamic properties
        $message  = $request->message; //dynamic properties
            $only = $request->only('fullname','email');
            $except = $request->except('_token');


        // if($request->has('age')){
        //     return $all;
        // }else{
        //     return 'no available request for that';
        // }
      
        // return ['1','2','3']; //array
        // return "Sample"; //array

        // return $all;

        // return redirect()->route('home'); //name route
        // return redirect()->back(); //name route
        // return redirect('contact-us'); //uri route


        if($request->message != ''){          
            return redirect('contact-us')->with('status', 'Save Successfully');
        }else{
            return redirect()->back()->with('status','Incomplete Data')->withInput();
        }
    }

}
