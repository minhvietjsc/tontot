<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function loadEdit(Request $request)
    {
        $data = Employee::findOrFail($request->id);
        if ($data)
        {
            echo json_encode($data);
        }else{
            echo 0;
        }   
    }
    public function loadEmployee()
    {
        return view('admin.employees.list');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->id =='')
        {
            $check_email = Employee::where('email', $request->email)->first();
            if ($check_email)
            {
                echo json_encode(['msg' => 'email']);
                exit;
            }
        }

        $obj = new Employee();
        if ($request->id != '')
        {
            $obj = $obj->findOrFail($request->id);
        }

        /* Start for request on add-user */
        $status = 'Inactive';
        if ($request->status==1)
        {
            $obj->status = $request->status;
            $status = 'Active';
        }
        /* Ends for request on add-user */

        $obj->fill($request->all());
        $obj->status = 0;
        // skip verify mobile
        $obj->mobile_verify = 1;
        $obj->password = bcrypt($request->password);
        $obj->plain_password = $request->password;

        if ($obj->save())
        {

            $email_temp = DB::table('email_settings')->select('registration_subject','registration_content')->where('user_id', Auth::user()->id)->first();

            $subject = $email_temp->registration_subject;
            $content = $email_temp->registration_content;

            $content = str_replace('%email%', $request->email, $content);
            $content = str_replace('%name%', $request->name, $content);
            $content = str_replace('%status%', $status, $content);
            $content = str_replace('%password%', $request->password, $content);

            $this->notification_to_email = $request->email;
            $this->notification_subject = $subject;

            $data = array('email' => $request->email, 'content' => $content, 'subject' => $subject );

            Mail::send('admin.user.email_notification', $data, function($msg){
                $msg->subject($this->notification_subject);
                $msg->to($this->notification_to_email);
            });
            echo json_encode(array('msg'=>1));
        }else{
            echo json_encode(array('msg'=>0));
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
    function showCard( Request $request )
    {
        if ($request->id !='')
        {
            $img = Employee::whereId($request->id)->value('id_card');
            echo $img;
        }else{
           echo 2;
        }
    }
}
