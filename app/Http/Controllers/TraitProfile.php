<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Auth;
use Hash;

trait TraitProfile
{
    use TraitSession;

    /**
     * View Profile
     * 
     * @return view
     */
    public function profileView()
    {
        return view('admin.profile.index');        
    }

    /**
     * Post Profile
     * 
     * @return view
     */
    public function profilePost(Request $request)
    {
        if ($this->checkUser($request, Auth::user()->id)) {
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

        if ($request->get('new_password') != null && strlen($request->get('new_password')) >= 6) {
            $data['password'] = bcrypt($request->get('new_password'));
        }

        User::findOrFail(Auth::user()->id)->update($data);

        $this->message('The profile has been updated successfully!');

        return redirect()->back();

    }

    /**
     * Password not correct
     * 
     * @return view
     */
    public function passwordNotCorrect()
    {
        $this->message('Make sure your password was correct!', 'danger');
        return redirect()->back();
    }

    /**
     * Checking if user are exist
     * 
     * @return bool
     */
    public function checkUser($request, $id)
    {
        $user = User::find($id);

        if(Hash::check($request->get('password'), $user->password)){
            return false;
        }
        
        return true;
    }
}
