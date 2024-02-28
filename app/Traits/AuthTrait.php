<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

trait AuthTrait
{
    public function verify(array $credentials, string $type): bool
    {
        switch ($type) {
            case 'login':
                if (!$this->getUserData('email', $credentials['email'])) {
                    return 'Invalid Email';
                } elseif (!$this->passwordVerify(
                    $this->getUserData('email', $credentials['email']),
                    $credentials['password']
                )) {
                    return 'Invalid Password';
                } else {
                    return true;
                }
                break;
            case 'register':
                $removeConfirmPwd = function () use ($credentials) {
                    unset($credentials['confirm-password']);

                    return $credentials;
                };

                $withoutConfirmPwd = $removeConfirmPwd();

                if ($credentials['password'] !== $credentials['confirm-password']) {
                    return 'Confirm Password must be same with Password';
                } elseif ($this->getUserData(array_keys($withoutConfirmPwd), array_values($withoutConfirmPwd))) {
                    return 'User Already Exists';
                } elseif ($this->getUserData('email', $credentials['email'])) {
                    return 'Email already exists';
                } else {
                    return true;
                }
            default:
                return true;
        }
    }

    private function getUserData(string|array $column, string|array $value)
    {
        if (is_string($column) && is_string($value)) {
            $data = User::where($column, $value)->get();
        } else {
            $toCheck = array_combine($column, $value);

            $user = DB::table('users');

            foreach ($toCheck as $c => $v) {
                $user->where($c, $v);
            }

            $data = $user->get();
        }

        return $data;
    }

    private function passwordVerify($user, $password): bool
    {
        return Hash::check($password, $user->password);
    }
}
