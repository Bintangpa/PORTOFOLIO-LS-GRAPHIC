<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\CreatesNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    use CreatesNotifications;
    /**
     * Display the account settings page
     */
    public function index()
    {
        // Additional security check
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya administrator yang dapat mengakses pengaturan akun.');
        }

        $user = auth()->user();
        return view('admin.account.index', compact('user'));
    }

    /**
     * Update account information
     */
    public function updateProfile(Request $request)
    {
        // Additional security check
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya administrator yang dapat mengubah pengaturan akun.');
        }

        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan oleh akun lain',
            'email.max' => 'Email maksimal 255 karakter',
        ]);

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // Log admin activity
            \Log::info('Admin mengubah profil akun', [
                'admin_id' => $user->id,
                'admin_name' => $user->name,
                'old_email' => $user->getOriginal('email'),
                'new_email' => $request->email,
                'timestamp' => now()
            ]);

            // Create notification
            $this->createAccountNotification('update', 'profile');

            return redirect()->route('admin.account.index')
                ->with('success', 'Profil berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->route('admin.account.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui profil: ' . $e->getMessage());
        }
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        // Additional security check
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya administrator yang dapat mengubah kata sandi.');
        }

        $user = auth()->user();
        
        // Debug log
        \Log::info('Password update attempt', [
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'is_admin' => $user->isAdmin(),
            'has_current_password' => !empty($request->current_password),
            'has_new_password' => !empty($request->password),
            'has_confirmation' => !empty($request->password_confirmation),
            'timestamp' => now()
        ]);

        $request->validate([
            'current_password' => 'required',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'
            ],
        ], [
            'current_password.required' => 'Kata sandi saat ini wajib diisi',
            'password.required' => 'Kata sandi baru wajib diisi',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok',
            'password.min' => 'Kata sandi minimal 8 karakter',
            'password.regex' => 'Kata sandi harus mengandung huruf dan angka',
        ]);

        // Verify current password
        \Log::info('Verifying current password', [
            'user_id' => $user->id,
            'current_password_length' => strlen($request->current_password),
            'stored_password_hash' => substr($user->password, 0, 20) . '...'
        ]);
        
        if (!Hash::check($request->current_password, $user->password)) {
            \Log::warning('Current password verification failed', [
                'user_id' => $user->id,
                'user_name' => $user->name
            ]);
            
            return redirect()->route('admin.account.index')
                ->withErrors(['current_password' => 'Kata sandi saat ini tidak benar.'])
                ->withInput();
        }
        
        \Log::info('Current password verified successfully', [
            'user_id' => $user->id
        ]);

        try {
            \Log::info('Starting password update process', [
                'user_id' => $user->id,
                'new_password_length' => strlen($request->password)
            ]);
            
            // Hash the new password
            $hashedPassword = Hash::make($request->password);
            
            \Log::info('New password hashed successfully', [
                'user_id' => $user->id,
                'new_hash_length' => strlen($hashedPassword)
            ]);
            
            // Update the user's password
            $updateResult = $user->update([
                'password' => $hashedPassword,
            ]);
            
            \Log::info('Password update result', [
                'user_id' => $user->id,
                'update_successful' => $updateResult,
                'user_refreshed' => $user->fresh()->password === $hashedPassword
            ]);

            // Log admin activity
            \Log::info('Admin mengubah kata sandi', [
                'admin_id' => $user->id,
                'admin_name' => $user->name,
                'timestamp' => now()
            ]);

            // Create notification
            $this->createAccountNotification('update', 'password');

            // Clear form data and show success message
            return redirect()->route('admin.account.index')
                ->with('success', 'Kata sandi berhasil diperbarui! Silakan gunakan kata sandi baru untuk login berikutnya.');

        } catch (\Exception $e) {
            \Log::error('Error updating password', [
                'admin_id' => $user->id,
                'error' => $e->getMessage(),
                'timestamp' => now()
            ]);
            
            return redirect()->route('admin.account.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui kata sandi: ' . $e->getMessage());
        }
    }
}