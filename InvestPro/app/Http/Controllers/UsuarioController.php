<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Listar todos os usuários
     */
    public function index()
    {
        return response()->json(Usuario::all(), 200);
    }

    /**
     * Criar um novo usuário
     */
    public function store(Request $request)
    {
        // Validação simples
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'senha' => 'required|string|min:6',
            'categoria' => 'required',
            'risco' => 'required',
        ]);

        // Verificar email duplicado
        if (Usuario::where('email', $request->email)->first()) {
            return response()->json(['erro' => 'Email já cadastrado'], 400);
        }

        // Criar usuário
        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'status' => $request->status ?? true,
            'categoria' => $request->categoria,
            'risco' => $request->risco,
            'criado_em' => now(),
        ]);

        return response()->json($usuario, 201);
    }

    /**
     * Mostrar um usuário pelo ID
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['erro' => 'Usuário não encontrado'], 404);
        }

        return response()->json($usuario, 200);
    }

    /**
     * Atualizar um usuário
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['erro' => 'Usuário não encontrado'], 404);
        }

        // Se atualizar senha, criptografa
        if ($request->has('senha')) {
            $request->merge([
                'senha' => Hash::make($request->senha)
            ]);
        }

        // Atualizar usuário
        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }

    /**
     * Excluir usuário
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['erro' => 'Usuário não encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(['mensagem' => 'Usuário removido com sucesso'], 200);
    }
}
