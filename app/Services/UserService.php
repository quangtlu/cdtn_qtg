<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\traits\HandleImage;

class UserService

{
    use HandleImage;

    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getPaginate(){
        $users = $this->userModel->latest()->paginate(10);
        return $users;
    }

    public function search($request)
    {
        $users = User::search($request->keyword)->paginate(10);
        return $users;
    }

    public function getById($id){
        $user = $this->userModel->findOrFail($id);
        return $user;
    }

    public function create($request){
        if($file = $request->file('image')) {
            $image = $this->uploadSingleImage($file);
        }
        else {
            $image = $this->getAvatarDefault($request->gender);
        }

        $data = [
            "name" => $request->name,
            "gender" => $request->gender,
            "image" => $image,
            "phone" => $request->phone,
            "dob" => $request->dob,
            "password" => Hash::make($request->password),
            "email" => $request->email,
        ];
        
        $user = $this->userModel->create($data);
        if ($request->roleNames) {
            $user->assignRole($request->roleNames);
        } else {
            $user->assignRole('user');
        }
    }

    public function update($request, $id){
        $user = $this->getById($id);
        $data = [
            "name" => $request->name,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "dob" => $request->dob,
            "password" => Hash::make($request->password),
            "email" => $request->email,
        ];
        if($file=$request->file('image')) {
            $name = $this->uploadSingleImage($file);
            $data['image'] = $name;
        }
        $user->update($data);
        if($request->role_id){
            $user->roles()->sync($request->role_id);
        }
    }

    public function delete($id){
        $user = $this->getById($id);
        $this->userModel->destroy($id);
        $user->roles()->detach();
    }
}
