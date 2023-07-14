<?php

namespace App\Helper;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserService{
    public $name, $email, $password;

    public function __construct($name= null,$email, $password,)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function validateInput($auth=false)
    {
        Log::info('Data before validation', ['name'=> $this->name ,'email' => $this->email, 'password' => $this->password]);

        $validationRule = $auth ? 'exists:users' : 'unique:users';
    
        if ($auth) {    
            $rules = [
                'email' => ['required', 'email:rfc,dns', $validationRule],
                'password' => ['required', 'string'],
            ];
        } else {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email:rfc,dns', $validationRule],
                'password' => ['required', 'string', Password::min(8)->letters()->numbers()->mixedCase()],
            ];
        }
    
        $validator = Validator::make(['name'=> $this->name ,'email' => $this->email, 'password' => $this->password], $rules);
    
        if ($validator->fails()) {
            return ['status' => false, 'messages' => $validator->messages()];
        } else {
            return ['status' => true];
        }
    }
    


    public function register($deviceName)
{
    $validate = $this->validateInput();
    if($validate['status']==false)
    {
        return $validate;
    }
    else{
        $user = User::create([
            'name'=>$this->name,
            'email'=>$this->email, 
            'password'=>Hash::make($this->password)]);

        $token = $deviceName
        ? $user->createToken($deviceName)->plainTextToken
        : $user->createToken('')->plainTextToken;

        return ['status' => true, 'token' => $token, 'user' => $user];
    }
}

public function login($deviceName){
    $validate = $this->validateInput(true);
    if($validate['status']==false)
    {
        return $validate;
    }
    else{
        $user = User::where('email',$this->email)->first();
        if(Hash::check($this->password, $user->password)){
          $token = $user->createToken($deviceName)->plainTextToken;

        return ['status' => true, 'token' => $token, 'user' => $user];
        }
        else{
            return ['status' => false, 'messages'=>['password' => ['Incorrect Password']]];
        }
    }
}
}