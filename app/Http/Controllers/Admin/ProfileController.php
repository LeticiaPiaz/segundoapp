<?php

namespace App\Http\Controllers\Admin;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth()->user();// obtendo informações sobre o 
        // verificando se o usuário está logado possui um perfil
        if(!$user->profile()->count()){
            $user->profile()->create();
        }
        return view('profile.index',compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //recuperando da requisição os dados do usuario
        $userData = $request->get('user');
        //recuperando da requisição os dados do perfil
        $profileData = $request->get('profile');
        try{
            // verificando se a uma nova senha no campo
            if($userData['password']){
                // se for verdadeiro, o campo receberá a senha criptografada
                $userData['password'] = bcrypt($userData['password']);
            } else{
                // caso não tenha sido
                unset($userData['password']);
            }

            $user = auth()->user();
            $user->update($userData);
            $user->profile()->update($profileData);
            flash('Perfil atualizado com sucesso!')->success();
            return redirect()->route('profile.index');
        }catch(Exception $e){
            $message = "Erro ao atualizar usuário/perfil";
            if(env('APP_DEBUG')){
                $message = $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
