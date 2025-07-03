<x-layouts.admin>
    <div class="p-4 sm:ml-64">
        <div class="bg-gray-300 rounded-xl ">
            <div class="pt-5 ml-6 text-xl font-semibold text-gray-700">
                <h1>UBAH USERS</h1>
            </div>
            <div class="pb-4 ml-6 text-sm font-semibold text-gray-700">
                <p></p>
            </div>
        </div>
        <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="p-6 mt-4 h-screen-1/2 rounded bg-gray-50 dark:bg-gray-800 border-2">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text"
                        class="form-control text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-1/4 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                        class="form-control text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-1/4 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        id="email" name="email" value="{{ $user->email }}" required unique>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text"
                        class="form-control text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-1/4 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        id="password" name="password" placeholder="Silahkan masukkan password baru" required
                        minlength="8">
                </div>
                <div class="flex gap-6">
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select
                            class="form-control text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-32 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                            id="role" name="role" required>
                            <option value="admin" @if ($user->role === 'admin') selected @endif>Admin</option>
                            <option value="user" @if ($user->role === 'user') selected @endif>User</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="aktif" class="form-label">Aktif</label>
                        <select
                            class="form-control text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-32 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                            id="aktif" name="aktif" required>
                            <option value="1" @if ($user->aktif) selected @endif>Ya</option>
                            <option value="0" @if (!$user->aktif) selected @endif>Tidak</option>
                        </select>
                    </div>
                </div>
                <a href="{{ route('dashboard.users.edit', $user) }}"
                    class="ml-3 px-6 py-1.5 rounded-md bg-blue-500 text-white font-semibold">Ubah</a>
                <a href="{{ route('dashboard.users.index') }}"
                    class="ml-3 px-6 py-1.5 rounded-md bg-red-500 text-white font-semibold">Batal</a>
            </div>
        </div>

    </div>
</x-layouts.admin>
