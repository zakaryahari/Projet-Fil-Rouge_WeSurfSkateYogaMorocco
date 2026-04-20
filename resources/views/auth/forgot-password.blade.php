<x-guest-layout>
    <div class="px-8 py-10">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-black text-darkCharcoal mb-2">Reset Password</h1>
            <p class="text-slate-600 text-sm">We'll help you get back into your account</p>
        </div>

        <!-- Info Message -->
        <div class="mb-6 bg-blue-50 border-l-4 border-primary rounded px-4 py-3">
            <p class="text-sm text-slate-700">
                Forgot your password? Enter your email address and we'll send you a link to reset it.
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-6" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                    class="bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                    placeholder="your@email.com"
                />
                <x-input-error :messages="$errors->get('email')" class="text-red-500 text-xs mt-1" />
            </div>

            <!-- Button -->
            <div class="flex flex-col gap-3 pt-4">
                <button
                    type="submit"
                    class="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-darkCharcoal transition-all flex items-center justify-center gap-2"
                >
                    <span>Send Reset Link</span>
                    <span class="material-symbols-outlined">send</span>
                </button>
            </div>
        </form>

        <!-- Back to Login Link -->
        <div class="mt-8 pt-6 border-t border-slate-200 text-center">
            <p class="text-slate-600 text-sm">
                Remember your password?
                <a href="{{ route('login') }}" class="text-primary font-bold hover:text-darkCharcoal transition-colors">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
