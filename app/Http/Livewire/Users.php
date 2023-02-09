<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $users, $name, $email, $age, $password, $userId, $updateUser = false, $addUser = false;

    /**
     * delete action listener
     */
    protected $listeners = [
        'deleteUserListener'=>'deleteuser'
    ];

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'email' => 'required|email',
        'name' => 'required|string',
        'password' => 'required|string',
        'age' => 'nullable|integer|min:1'
    ];

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->age = 0;
    }

    /**
     * render the user data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->users = User::select('id', 'name', 'email', 'age', 'created_at')->get();
        return view('livewire.users');
    }

    /**
     * Open Add user form
     * @return void
     */
    public function addUser()
    {
        $this->resetFields();
        $this->addUser = true;
        $this->updateUser = false;
    }
    /**
     * store the user inputted user data in the users table
     * @return void
     */
    public function storeUser()
    {
        $this->validate();
        try {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'age' => $this->age
            ]);
            session()->flash('success','user Created Successfully!!');
            $this->resetFields();
            $this->addUser = false;
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }

    /**
     * show existing user data in edit user form
     * @param mixed $id
     * @return void
     */
    public function editUser($id){
        try {
            $user = User::findOrFail($id);
            if( !$user) {
                session()->flash('error','user not found');
            } else {
                $this->name = $user->name;
                $this->email = $user->email;
                $this->password = '';
                $this->age = $user->age;
                $this->userId = $user->id;
                $this->updateUser = true;
                $this->addUser = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }

    }

    /**
     * update the user data
     * @return void
     */
    public function updateUser()
    {
        $this->validate();
        try {
            User::whereId($this->userId)->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'age' => $this->age
            ]);
            session()->flash('success','user Updated Successfully!!');
            $this->resetFields();
            $this->updateUser = false;
        } catch (\Exception $ex) {
            session()->flash('success','Something goes wrong!!');
        }
    }

    /**
     * Cancel Add/Edit form and redirect to user listing page
     * @return void
     */
    public function cancelUser()
    {
        $this->addUser = false;
        $this->updateUser = false;
        $this->resetFields();
    }

    /**
     * delete specific user data from the users table
     * @param mixed $id
     * @return void
     */
    public function deleteUser($id)
    {
        try{
            User::find($id)->delete();
            session()->flash('success',"user Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }
}
