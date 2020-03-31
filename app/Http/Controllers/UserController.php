<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    use TraitProfile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::exceptMe()->filter($request)->paginate(20);
        $view = [
            'items' => $data,
        ];
        return view('admin.user.index')->with($view);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = [
            'method' => 'create',
        ];

        return view('admin.user.create_edit')->with($view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if($request->get('new_password') != $request->get('new_password2')){
            return $this->passwordNotCorrect();
        }

        User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('new_password')),
        ]);
        $this->message('The user has been successfully created!');
        return redirect('user');

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
        $view = [
            'method' => 'edit',
            'item' => User::findOrFail($id)
        ];

        return view('admin.user.create_edit')->with($view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if($this->checkUser($request, $id)){
            return $this->passwordNotCorrect();
        }
        if ($request->get('new_password') != $request->get('new_password2')) {
            return $this->passwordNotCorrect();
        }

        $data = [
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
        ];

        if($request->get('new_password') != null && strlen($request->get('new_password')) >= 6){
            $data['password'] = bcrypt($request->get('new_password'));
        }

        User::findOrFail($id)->update($data);

        $this->message('The user has been successfully updated!');

        return redirect('user');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        User::find($data->id)->update([
            'username' => $data->username.";",
            'email' => $data->email.";",
        ]);
        $data = $data->delete();

        $this->message('The user has been successfully deleted!');

        return redirect()->back();
    }

}
