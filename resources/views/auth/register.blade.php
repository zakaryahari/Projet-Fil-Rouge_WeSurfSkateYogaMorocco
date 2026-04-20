<x-guest-layout>
    <div class="px-8 py-10">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-black text-darkCharcoal mb-2">Create Account</h1>
            <p class="text-slate-600 text-sm">Join WeSurfSkateYoga community</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="flex flex-col gap-2">
                <label for="name" class="font-semibold text-slate-700 text-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-base text-primary">person</span>
                    Full Name
                </label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    class="bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                    placeholder="John Doe"
                />
                <x-input-error :messages="$errors->get('name')" class="text-red-500 text-xs mt-1" />
            </div>

            <!-- Phone Number -->
            <div class="flex flex-col gap-2">
                <label for="phone_number" class="font-semibold text-slate-700 text-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-base text-primary">phone</span>
                    Phone Number
                </label>
                <input
                    id="phone_number"
                    type="tel"
                    name="phone_number"
                    value="{{ old('phone_number') }}"
                    required
                    autocomplete="tel"
                    class="bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                    placeholder="+1 (555) 000-0000"
                />
                <x-input-error :messages="$errors->get('phone_number')" class="text-red-500 text-xs mt-1" />
            </div>

            <!-- Email Address -->
            <div class="flex flex-col gap-2">
                <label for="email" class="font-semibold text-slate-700 text-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-base text-primary">mail</span>
                    Email Address
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="username"
                    class="bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                    placeholder="your@email.com"
                />
                <x-input-error :messages="$errors->get('email')" class="text-red-500 text-xs mt-1" />
            </div>

            <!-- Password -->
            <div class="flex flex-col gap-2">
                <label for="password" class="font-semibold text-slate-700 text-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-base text-primary">lock</span>
                    Password
                </label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    class="bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                    placeholder="••••••••"
                />
                <x-input-error :messages="$errors->get('password')" class="text-red-500 text-xs mt-1" />
            </div>

            <!-- Confirm Password -->
            <div class="flex flex-col gap-2">
                <label for="password_confirmation" class="font-semibold text-slate-700 text-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-base text-primary">lock_check</span>
                    Confirm Password
                </label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                    placeholder="••••••••"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-red-500 text-xs mt-1" />
            </div>

            <!-- Register Button -->
            <div class="flex flex-col gap-3 pt-4">
                <button
                    type="submit"
                    class="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-darkCharcoal transition-all flex items-center justify-center gap-2"
                >
                    <span>Create Account</span>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="mt-8 pt-6 border-t border-slate-200 text-center">
            <p class="text-slate-600 text-sm">
                Already have an account?
                <a href="{{ route('login') }}" class="text-primary font-bold hover:text-darkCharcoal transition-colors">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
