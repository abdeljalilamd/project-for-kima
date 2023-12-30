## Step Create this Project

# make new project Laravel
```sh
Laravel New OnWayProject
```

- Connect Database with .env file
# make Migration test
```sh
php artisan migrate
```

- Add files migration from old project
# make migration : Drop All tables and create all tables
```sh
php artisan migrate:fresh
```

# make model for all tables
```sh
php artisan make:model Chat
```

# install breeze using this link https://laravel.com/docs/10.x/starter-kits
```sh
composer require laravel/breeze --dev
php artisan breeze:install
```
- chosse blade instalation

```sh
php artisan migrate
npm install
npm run dev
```

- testing register page " have error for required colum table user ".
- use function dd($request); for find error on controller -> Auth -> RegisteredUserController
.


# add column Role & PhoneNumber in Resources -> Views -> Auth -> register.blade.php

>       <!-- Phone Number -->
>         <div class="mt-4">
>             <x-input-label for="phoneNumber" :value="__('Phone Number')" />
>             <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="old('phoneNumber')" required autocomplete="phoneNumber" />
>             <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
>         </div>
> 
>         <!-- Role -->
>         <div class="mt-4">
>             <x-input-label for="role" :value="__('Account Type')" />
>             <select name="role" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="role">
>                 <option value="jobSeeker">jobSeeker</option>
>                 <option value="recruiter">recruiter</option>
>               </select>
>             <x-input-error :messages="$errors->get('role')" class="mt-2" />
>         </div>

# Edit Store function in RegisteredUserController
>         $request->validate([
>             'name' => ['required', 'string', 'max:255'],
>             'phoneNumber' => ['required', 'string', 'max:255'],
>             'role' => ['required', 'string'],
>             'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
>             'password' => ['required', 'confirmed', Rules\Password::defaults()],
>         ]);
> 
>         $user = User::create([
>             "id" => Str::uuid(),
>             'name' => $request->name,
>             'location' => 'Morocco, Casablanca',
>             'role' => $request->role,
>             'email' => $request->email,
>             'phoneNumber' => $request->phoneNumber,
>             'password' => Hash::make($request->password),
>         ]);