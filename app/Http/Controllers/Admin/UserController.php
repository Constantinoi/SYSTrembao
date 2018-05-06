<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Papel;

class UserController extends Controller
{
    
   

    public function index()
    {
        if(Gate::denies('Administrador')){
            abort(403,"Não autorizado!");
          }
        $users = User::all();
        $papeis = Papel::all();            
        return view('admin.user.index',compact('users','papeis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('Administrador')){
            abort(403,"Não autorizado!");
        }       
        
        $papeis= Papel::all();
        return view('admin.user.create', compact('papeis'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       if(Gate::denies('Administrador')){
           abort(403,"Não autorizado!");
        }
  
          $data = $request->all(); 
        
          $user = User::create(
                [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => encrypt($data['password'])                    
                ]);

            return redirect()->route('user.index');
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
        if(Gate::denies('Administrador')){
            abort(403,"Não autorizado!");
        }

        $user = User::find($id);
        
        // try{
        //     $password = $user->password;
        //     $decrypted = decrypt($password);
        //     $user->password = $decrypted;
        // } catch (DecryptException $e) {
        //     dd($e);
        // }   
              
        return view('admin.user.edit',compact('user'));
       
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
        if(Gate::denies('Administrador')){
            abort(403,"Não autorizado!");
        }
          dd("passei do teste1");
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }   
        dd("passei do teste2");

        if($request['name']){
            $data = $request->all();
            $user = User::find($id);
            User::find($id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($request->get('new-password'))
               
                ]);
        }
        
        return redirect()->route('user.index');
         
        
              
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if(Gate::denies('Administrador')){
            abort(403,"Não autorizado!");
          }
          $user = User::find($id)->delete();
          
          return redirect()->route('user.index');
      
    }
    public function remover($id){
        if(Gate::denies('Administrador')){
            abort(403,"Não autorizado!");
            
          }

          $user = User::find($id);

          if($user->name  == "Admin"){
            return redirect()->route('user.index');
        }


          $user = User::find($id);
          return view('admin.user.remove',compact('user'));
      
   }

   public function papel($id)
   {
     if(Gate::denies('Administrador')){
       abort(403,"Não autorizado!");
     }

     $usuario = User::find($id);
     $papel = Papel::all();
     
     return view('admin.user.papel',compact('usuario','papel'));
   }

   public function papelStore(Request $request, $user, $papel_id)
   {
       if(Gate::denies('Administrador')){
         abort(403,"Não autorizado!");
       }

       
       $usuario = User::find($user);
       $dados = $request->all();
       $papel = Papel::find($papel_id);
        
       if($papel->nome == 'Admin'){
        return redirect()->back();
       }
       $usuario->adicionaPapel($papel); 
       return redirect()->back();
   }

   public function papelDestroy($id,$papel_id)
   {
     if(Gate::denies('Administrador')){
       abort(403,"Não autorizado!");
     }

     if(Papel::find($papel_id)->nome == "Admin"){
        return redirect()->route('user.index');
    }
     $usuario = User::find($id);
     $papel = Papel::find($papel_id);
     $usuario->removePapel($papel);
     return redirect()->back();
   }
}
