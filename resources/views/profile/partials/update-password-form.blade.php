<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <label for="update_password_current_password" class="font-semibold text-slate-700 text-sm flex items-center gap-2 mb-2">
                <span class="material-symbols-outlined text-base text-primary">lock</span>
                Current Password
            </label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="w-full bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-red-500 text-xs mt-2" />
        </div>

        <!-- New Password -->
        <div>
            <label for="update_password_password" class="font-semibold text-slate-700 text-sm flex items-center gap-2 mb-2">
                <span class="material-symbols-outlined text-base text-primary">lock_open</span>
                New Password
            </label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="w-full bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="text-red-500 text-xs mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="update_password_password_confirmation" class="font-semibold text-slate-700 text-sm flex items-center gap-2 mb-2">
                <span class="material-symbols-outlined text-base text-primary">lock_check</span>
                Confirm Password
            </label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="w-full bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-red-500 text-xs mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4 pt-4">
            <button
                type="submit"
                class="bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-darkCharcoal transition-all flex items-center justify-center gap-2"
            >
                <span class="material-symbols-outlined">check_circle</span>
                <span>Update Password</span>
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-semibold flex items-center gap-2"
                >
                    <span class="material-symbols-outlined text-base">check</span>
                    Updated successfully
                </p>
            @endif
        </div>
    </form>
</section>
