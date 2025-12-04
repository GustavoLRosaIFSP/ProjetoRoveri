<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        User::create([
            'nome'      => $request->nome,
            'email'     => $request->email,
            'password'  => Hash::make($request->senha),
            'categoria' => Categoria::from($request->categoria),
            'risco'     => Risco::from($request->risco),
        ]);

        return redirect()->route('usuarios.index');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'categoria' => 'required|string',
            'risco' => 'required|string',
            'password' => 'nullable|min:6',
        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('usuarios.index');
    }
}
