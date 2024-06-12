<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $password = Hash::make('wald493#2');

        // Admin user
        $admin = new User();
        $admin->password = $password;
        $admin->name = 'admin';
        $admin->email_verified_at = now();
        $admin->email = 'admin@htl-villach.at';
        $admin->save();

        // Editor user
        $editor = new User();
        $editor->password = $password;
        $editor->name = 'editor';
        $editor->email_verified_at = now();
        $editor->email = 'editor@htl-villach.at';
        $editor->save();

        // Regular user
        $user = new User();
        $user->password = $password;
        $user->name = 'user';
        $user->email_verified_at = now();
        $user->email = 'user@htl-villach.at';
        $user->save();

        $yourUsernameUser = new User();
        $yourUsernameUser->password = Hash::make('your_password');
        $yourUsernameUser->name = 'Your Username';
        $yourUsernameUser->email_verified_at = now();
        $yourUsernameUser->email = 'yourusername@htl-villach.at';
        $yourUsernameUser->save();

        // Favorite meal user
        $favoriteMealUser = new User();
        $favoriteMealUser->password = Hash::make('favorite_password');
        $favoriteMealUser->name = 'Favorite Meal';
        $favoriteMealUser->email_verified_at = now();
        $favoriteMealUser->email = 'favoritemeal@htl-villach.at';
        $favoriteMealUser->save();

        // Relative user
        $relativeUser = new User();
        $relativeUser->password = Hash::make('relative_password');
        $relativeUser->name = 'Relative';
        $relativeUser->email_verified_at = now();
        $relativeUser->email = 'relative@htl-villach.at';
        $relativeUser->save();
    }
}
