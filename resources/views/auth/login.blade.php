<x-guest-layout>
    <div class="px-8 py-10">
        <!-- Status Message -->
        <x-auth-session-status class="mb-6" :status="session('status')" />

        <!-- Ban Error Alert -->
        @if ($errors->has('error'))
            <div class="mb-6 p-4 bg-red-50 border-2 border-red-300 rounded-lg flex items-start gap-3">
                <span class="material-symbols-outlined text-red-600 text-lg flex-shrink-0 mt-0.5">block</span>
                <div>
                    <p class="font-bold text-red-700 text-sm">Account Banned</p>
                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('error') }}</p>
                </div>
            </div>
        @endif
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-black text-darkCharcoal mb-2">Sign In</h1>
            <p class="text-slate-600 text-sm">Welcome back to WeSurfSkateYoga</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

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
                    autofocus
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
                    autocomplete="current-password"
                    class="bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                    placeholder="••••••••"
                />
                <x-input-error :messages="$errors->get('password')" class="text-red-500 text-xs mt-1" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="w-4 h-4 rounded border-slate-300 text-primary bg-slate-50 focus:ring-2 focus:ring-primary/20 cursor-pointer"
                />
                <label for="remember_me" class="ms-3 text-sm text-slate-600 cursor-pointer">
                    Remember me
                </label>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col gap-3 pt-4">
                <button
                    type="submit"
                    class="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-darkCharcoal transition-all flex items-center justify-center gap-2"
                >
                    <span>Sign In</span>
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>

                @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="text-center text-sm text-primary hover:text-darkCharcoal font-semibold transition-colors"
                    >
                        Forgot your password?
                    </a>
                @endif
            </div>
        </form>

        <!-- Register Link -->
        <div class="mt-8 pt-6 border-t border-slate-200 text-center">
            <p class="text-slate-600 text-sm">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-primary font-bold hover:text-darkCharcoal transition-colors">
                    Create one
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
