<section class="space-y-6">
    <p class="text-sm text-red-700">
        Once your account is deleted, all of its resources and data will be permanently deleted. Please download any data you wish to retain before deletion.
    </p>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-700 transition-all flex items-center justify-center gap-2"
    >
        <span class="material-symbols-outlined">delete_forever</span>
        <span>Delete Account</span>
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-6">
            <div class="flex items-center gap-3 mb-6">
                <span class="material-symbols-outlined text-3xl text-red-600">warning</span>
                <h2 class="text-2xl font-bold text-red-700">Delete Account?</h2>
            </div>

            <p class="text-slate-700 mb-6">
                This action cannot be undone. All your data will be permanently deleted.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6">
                @csrf
                @method('delete')

                <!-- Password Confirmation -->
                <div>
                    <label for="password" class="font-semibold text-slate-700 text-sm flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined text-base text-primary">lock</span>
                        Confirm with your password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full bg-slate-50 border-2 border-slate-200 rounded-lg px-4 py-3 text-sm focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                        placeholder="••••••••"
                    />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="text-red-500 text-xs mt-2" />
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">
                    <button
                        type="button"
                        x-on:click="$dispatch('close')"
                        class="px-6 py-2 font-semibold text-slate-700 bg-slate-100 rounded-lg hover:bg-slate-200 transition-colors"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="px-6 py-2 font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors flex items-center gap-2"
                    >
                        <span class="material-symbols-outlined">delete</span>
                        Delete Forever
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</section>
