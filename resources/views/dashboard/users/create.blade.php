<x-layouts.admin>
    @if (Auth::user()->role == 'admin')
        <div class="p-4 sm:ml-64">
            <div class="bg-gray-300 rounded-xl ">
                <div class="pt-5 ml-6 text-xl font-semibold text-gray-700">
                    <h1>TAMBAH USERS</h1>
                </div>
                <div class="pb-4 ml-6 text-sm font-semibold text-gray-700">
                    <p></p>
                </div>
            </div>
            <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="p-6 mt-4 h-screen-1/2 rounded bg-gray-50 dark:bg-gray-800 border-2">
                    <form action="{{ route('dashboard.users.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text"
                                class="form-control text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-1/4 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                class="form-control text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-1/4 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                id="email" name="email" required unique>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                class="form-control text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-1/4 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                id="password" name="password" required minlength="8">
                        </div>
                        <div class="flex gap-6">
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select
                                    class="form-control text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-32 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                    id="role" name="role" required>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="aktif" class="form-label">Aktif</label>
                                <select
                                    class="form-control text-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-32 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                    id="aktif" name="aktif" required>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit"
                            class="font-semibold px-3 py-1 rounded-md bg-blue-500 text-white">Simpan</button>
                        <a href="{{ route('dashboard.users.index') }}"
                            class="ml-3 px-6 py-1.5 rounded-md bg-red-500 text-white font-semibold">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    @else
        <script>
            window.location = "/dashboard";
        </script>
    @endif
</x-layouts.admin>
