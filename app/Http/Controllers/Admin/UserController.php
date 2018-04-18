<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Papel;
use Validator;

class UserController extends Controller
{
    protected function validarEdit($request){
        $validator = Validator::make($request->all(),
            ['name' => 'required|string|max:255',
            'email' => 'nullable',
            'password' => 'nullable',
       
       
        ]);
        return $validator;
    }
    protected function validarUsuario($request){
        $validator = Validator::make($request->all(),
            ['name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
       
        ]);
        return $validator;
    }

    public function index()
    {
        if(Gate::denies('Lista de usuários')){
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
        if(Gate::denies('Criar usuário')){
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
    public function store(Request $request)
    {
       if(Gate::denies('Criar usuário')){
           abort(403,"Não autorizado!");
         }
       $validator = $this->validarUsuario($request);
       if($validator->fails()){
           return redirect()->back()->withErrors($validator->errors());
       }


          $data = $request->all(); 
        
          $user = User::create(
                [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])                    
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
        if(Gate::denies('Editar usuário')){
            abort(403,"Não autorizado!");
          }
          $user = User::find($id);

         // if($user->name  == "Admin"){
         //   return redirect()->route('usuarios.index');
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
    public function update(Request $request, $id)
    {
        if(Gate::denies('Editar usuário')){
            abort(403,"Não autorizado!");
          }
        $validator = $this->validarEdit($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        if($request['name']){
            $data = $request->all();
            $user = User::find($id);
            User::find($id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
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
        if(Gate::denies('Deletar usuário')){
            abort(403,"Não autorizado!");
          }
          $user = User::find($id)->delete();
          
          return redirect()->route('user.index');
      
    }
    public function remover($id){
        if(Gate::denies('Deletar usuário')){
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
     if(Gate::denies('Editar usuário')){
       abort(403,"Não autorizado!");
     }

     $usuario = User::find($id);
     $papel = Papel::all();
     
     return view('admin.user.papel',compact('usuario','papel'));
   }

   public function papelStore(Request $request,$id)
   {
       if(Gate::denies('Criar usuário')){
         abort(403,"Não autorizado!");
       }
       $usuario = User::find($id);
       $dados = $request->all();
       $papel = Papel::find($dados['papel_id']);
       $usuario->adicionaPapel($papel);
       return redirect()->back();
   }

   public function papelDestroy($id,$papel_id)
   {
     if(Gate::denies('Deletar usuário')){
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
