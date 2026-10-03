<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

#[Signature('app:create-school-user')]
#[Description('Create an authorised TEFA-Hub user with a securely entered password')]
class CreateSchoolUser extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $role = $this->choice('Role pengguna', ['siswa', 'guru', 'admin'], 'siswa');
        $name = (string) $this->ask('Nama lengkap');
        $email = (string) $this->ask('Email');
        $nis = $role === 'siswa' ? (string) $this->ask('NIS') : null;
        $password = (string) $this->secret('Kata sandi (minimal 12 karakter)');
        $passwordConfirmation = (string) $this->secret('Ulangi kata sandi');

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'nis' => $nis,
            'password' => $password,
            'password_confirmation' => $passwordConfirmation,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique(User::class, 'email')],
            'nis' => [$role === 'siswa' ? 'required' : 'nullable', 'string', 'max:20', Rule::unique(User::class, 'nis')],
            'password' => ['required', 'string', 'min:12', 'confirmed'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'nis' => $nis,
            'password' => $password,
            'role' => $role,
            'is_active' => true,
        ]);

        $user->assignRole(Role::findOrCreate($role));
        $this->info("Akun {$role} untuk {$user->email} berhasil dibuat.");

        return self::SUCCESS;
    }
}
