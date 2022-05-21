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

    public function getListUser(){
        $users = $this->userModel->latest()->paginate(10);
        return $users;
    }

    public function getUser($id){
        $user = $this->userModel->findOrFail($id);   
        return $user; 
    }

    public function create($request){
        $data = [
            "name" => $request->name,
            "phone" => $request->phone,
            "role_id" => $request->role_id,
            "password" => Hash::make($request->password),
            "email" => $request->email,
        ];
        $this->userModel->create($data);
    }

    public function update($request, $id){
        $user = $this->getUser($id);
        $data = [
            "name" => $request->name,
            "phone" => $request->phone,
            "role_id" => $request->role_id,
            "password" => md5($request->password),
            "email" => $request->email,
        ];
        $user->update($data);
    }

    public function delete($id){
        $this->userModel->destroy($id);
    }
}
