<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Main application entry point.
     */
    public function entry()
    {
        // Not logged in → Login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Cashier → POS
        if (session()->get('user_role') === 'Cashier') {
            return redirect()->to('/pos');
        }

        // Administrator → Dashboard
        return redirect()->to('/dashboard');
    }


    /**
     * Login page.
     */
    public function login()
    {
        // Already logged in
        if (session()->get('logged_in')) {

            // Cashier → POS
            if (session()->get('user_role') === 'Cashier') {
                return redirect()->to('/pos');
            }

            // Administrator → Dashboard
            return redirect()->to('/');
        }

        return view('auth/login');
    }


    /**
     * Authenticate user.
     */
    public function authenticate()
    {
        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');
        $loginRole = trim((string) $this->request->getPost('login_role'));

        // Validate credentials
        if ($email === '' || $password === '') {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Email and password are required.');
        }

        // Find user
        $user = $this->userModel
            ->where('email', $email)
            ->first();

        // Invalid credentials
        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Invalid email or password.');
        }

        // Validate selected login role
        if (!in_array($loginRole, ['Administrator', 'Cashier'], true)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Please select an account type.');
        }

        // Selected role must match database role
        if ($user['role'] !== $loginRole) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'This account is registered as ' . $user['role'] . '.'
                );
        }

        // Regenerate session
        session()->regenerate(true);

        // Store authenticated user
        session()->set([
            'user_id'   => $user['id'],
            'name'      => $user['name'],
            'user_name' => $user['name'],
            'user_role' => $user['role'],
            'logged_in' => true,
        ]);

        // Cashier → POS
        if ($user['role'] === 'Cashier') {
            return redirect()->to('/pos');
        }

        // Administrator → Dashboard
        return redirect()->to('/dashboard');
    }


    /**
     * Logout.
     */
    public function logout()
    {
        session()->destroy();

        return redirect()
            ->to('/login')
            ->with('success', 'You have been logged out.');
    }
}