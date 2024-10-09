<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService
{
    public function createUser(array $data)
    {
        // パスワードをハッシュ化
        $data[User::PASSWORD] = Hash::make($data[User::PASSWORD]);

        // 新規ユーザーを作成
        $user = User::create($data);

        return $user;
    }
}
