<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class UsersApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles', 'id_profissional'])->get());
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
    public function getDados(Request $request) {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try{
            $this->validate($request, [
                'login' => 'required',
            ]);
            $user = User::where('email',$request->input('login'))->first();
            if ($user) {
                /*if (Hash::check($request->input('senha'), $user->password)) {
                    if($user->token_access === null){
                        $apikey = base64_encode(str_random(40));
                        User::where('email', $request->input('login'))->update(['remember_token' => "$apikey"]);
                    }*/
                   // $user = User::where('email', $request->input('login'))->first();
                    $user = new UserResource($user->load(['roles', 'id_profissional']));
                    return response()->json($user, 200);
                //}
                //return response()->json(['error' => 'Senha incorreta!'], 500);
            } else {
                return response()->json(['error' => 'Email não encontrado!'], 500);
            }
        }catch(Exception $e){
            return response()->json(['error' => 'Sem serviço!'], 500);
        }

        
    }
    public function show(User $user)
    {
        //abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource($user->load(['roles', 'id_profissional']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
