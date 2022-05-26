<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService

{
    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getPaginate(){
        $users = $this->userModel->latest()->paginate(10);
        return $users;
    }

    public function getById($id){
        $user = $this->userModel->findOrFail($id);   
        return $user; 
    }

    public function create($request){
        $data = [
            "name" => $request->name,
            "phone" => $request->phone,
            "password" => Hash::make($request->password),
            "email" => $request->email,
        ];
        $user = $this->userModel->create($data);
        $user->assignRole($request->roleNames);
    }

    public function update($request, $id){
        $user = $this->getById($id);
        $data = [
            "name" => $request->name,
            "phone" => $request->phone,
            "password" => Hash::make($request->password),
            "email" => $request->email,
        ];
        $user->update($data);
        $user->roles()->sync($request->role_id);
    }

    public function delete($id){
        $user = $this->getById($id);
        $this->userModel->destroy($id);
        $user->roles()->detach();
    }
}
