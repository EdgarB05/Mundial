<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserUpdateMail;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'role' => 'required|in:cliente,admin',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('boletos.index');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('boletos.index');
        }

        return back()->withErrors([
            'email' => 'Datos incorrectos',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('acceso');
    }

    public function adminDashboard()
    {

        // Obtener los datos del modelo
        $users = User::all();

        return view('admin.dashboard', compact('users'));
        #return view('admin.dashboard');
    }

    public function empleadoDashboard()
    {
        return view('empleado.dashboard');
    }

    public function editUser(User $user)
    {
        return view('admin.editUser', compact('user'))
            ->with('warning', 'Estás editando información del usuario. Verifica los cambios antes de guardar.');
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'role' => 'required|in:admin,cliente',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $changes = [];

        if ($user->name !== $validated['name']) {
            $changes[] = 'Nombre actualizado';
        }

        if ($user->email !== $validated['email']) {
            $changes[] = 'Correo actualizado';
        }

        if (($user->phone ?? '') !== $validated['phone']) {
            $changes[] = 'Teléfono actualizado';
        }

        if ($user->role !== $validated['role']) {
            $changes[] = 'Rol actualizado';
        }

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
            $changes[] = 'Contraseña actualizada';
        }

        $user->update($data);

        if (!empty($changes)) {
            Mail::to($user->email)->send(new UserUpdateMail($user->fresh(), $changes));
        }

        return redirect()->route('usuarios.edit', $user)
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroyUser(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error', 'No puedes eliminar tu propio usuario mientras tienes sesión iniciada.');
        }

        $user->delete();

        return redirect()->route('admin-dashboard')->with('success', 'Usuario eliminado correctamente.');
    }
}
