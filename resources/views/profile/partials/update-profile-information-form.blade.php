<section>
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div>
            <label for="name" class="font-semibold text-slate-700 text-sm flex items-center gap-2 mb-2">
                <span class="material-symbols-outlined text-base text-primary">badge</span>
                Full Name
            </label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="w-full bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                placeholder="Your full name"
            />
            <x-input-error class="text-red-500 text-xs mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Field -->
        <div>
            <label for="email" class="font-semibold text-slate-700 text-sm flex items-center gap-2 mb-2">
                <span class="material-symbols-outlined text-base text-primary">mail</span>
                Email Address
            </label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="w-full bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                placeholder="your@email.com"
            />
            <x-input-error class="text-red-500 text-xs mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-sm text-yellow-800">
                        Your email address is unverified.
                    </p>
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>
                    <button form="send-verification" class="text-sm text-primary font-semibold hover:text-darkCharcoal transition-colors mt-2">
                        Click here to re-send the verification email
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4 pt-4">
            <button
                type="submit"
                class="bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-darkCharcoal transition-all flex items-center justify-center gap-2"
            >
                <span class="material-symbols-outlined">check_circle</span>
                <span>Save Changes</span>
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-semibold flex items-center gap-2"
                >
                    <span class="material-symbols-outlined text-base">check</span>
                    Saved successfully
                </p>
            @endif
        </div>
    </form>
</section>
