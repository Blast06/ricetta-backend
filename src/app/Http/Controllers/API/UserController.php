<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\API\UserResource;
use Hash;
Use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $input = $request->all();
                
        $password = $input['password'];
        $input['user_type'] = isset($input['user_type']) ? $input['user_type'] : 'user';
        $input['password'] = Hash::make($password);

        $user = User::create($input);
        $input['api_token'] = $user->createToken('auth_token')->plainTextToken;

        unset($input['password']);
        $message = __('messages.save_form',['form' => $input['user_type'] ]);

        $response = [
            'message' => $message,
            'data' => $user
        ];
        return comman_custom_response($response);
    }

    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            
            $user = Auth::user();
            if(request('player_id') != null){
                $user->player_id = request('player_id');
            }
            $user->save();
            
            $success = $user;
            $success['api_token'] = $user->createToken('auth_token')->plainTextToken;
            $success['profile_image'] = getSingleMedia($user,'profile_image');
            unset($success['media']);

            return response()->json([ 'data' => $success ], 200 );
        }
        else{
            $message = __('auth.failed');
            
            return comman_message_response($message,400);
        }
    }

    public function changePassword(Request $request){
        $user = User::where('id',\Auth::user()->id)->first();

        if($user == "") {
            $message = __('messages.user_not_found');
            return comman_message_response($message,400);   
        }
           
        $hashedPassword = $user->password;

        $match = Hash::check($request->old_password, $hashedPassword);

        $same_exits = Hash::check($request->new_password, $hashedPassword);
        if ($match)
        {
            if($same_exits){
                $message = __('messages.old_new_pass_same');
                return comman_message_response($message,400);
            }

			$user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
            
            $message = __('messages.password_change');
            return comman_message_response($message,200);
        }
        else
        {
            $message = __('messages.valid_password');
            return comman_message_response($message);
        }
    }

    public function updateProfile(Request $request)
    {   
        $user = \Auth::user();
        if($user == null){
            return comman_message_response(__('messages.user_not_found'),400);
        }

        $user->fill($request->all())->update();

        storeMediaFile($user,$request->profile_image, 'profile_image');

        $user_data = User::find($user->id);
        $message = __('messages.update_form',['form' => __('messages.profile') ]);
        $user_data['profile_image'] = getSingleMedia($user_data,'profile_image');
        
        unset($user_data['media']);
        $response = [
            'data' => $user_data,
            'message' => $message
        ];
        return comman_custom_response( $response );
    }

    public function logout(Request $request){
        $user = Auth::user();

        if($request->is('api*')){
            $user->player_id = null;
            $user->save();
            return comman_message_response('Logout successfully');
        }
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = Password::sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? response()->json(['message' => __($response), 'status' => true], 200)
            : response()->json(['message' => __($response), 'status' => false], 400);
    }
    public function socialLogin(Request $request)
    {
        $input = $request->all();
        
        $user_data = User::where('email',$input['email'])->first();

        if( $user_data != null ) {
            $message = 'User login successfully';
        } else {
            $password = $input['accessToken'];
            $login_type = $input['login_type'];
            $input['password'] = Hash::make($password);
            $input['login_type'] = $login_type;
            $users = User::create($input);
    
            $message = 'User saved successfully';
            $user_data = User::where('id',$users->id)->first();
        }
        $user_data['api_token'] = $user_data->createToken('auth_token')->plainTextToken;
        $response = [
            'status' => true,
            'message' => $message,
            'data' => $user_data
        ];
        return comman_custom_response($response);
    }
}
