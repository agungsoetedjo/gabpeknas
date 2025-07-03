<x-layouts.admin>
    @if (Auth::user()->role == 'admin')

        <div class="p-4 sm:ml-64">
            <div class="bg-gray-300 rounded-xl ">
                <div class="p-5 ml-6 text-xl font-semibold text-gray-700">
                    <h1>DAFTAR USER</h1>
                </div>
            </div>
            <div class="mt-6 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <a href="{{ route('dashboard.users.create') }}"
                    class="flex w-20 text-white rounded-md bg-green-400 py-1 px-3 justify-center">
                    <svg class="justify-between w-5 h-5 text-white dark:text-white mr-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 -2 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    User</a>
                <div class="mt-4 h-screen-1/2 rounded bg-gray-50 dark:bg-gray-800 border-2">


                    <table class="table table-striped container">
                        <thead class="border-b-2">
                            <tr>
                                <th class="py-2">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aktif</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->id }}</td>
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->role }}</td>
                                    <td class="text-center">{{ $user->aktif ? 'Ya' : 'Tidak' }}</td>
                                    <td class="justify-center py-2 flex gap-2">
                                        {{-- <a href="{{ route('users.show', $user) }}" class="text-white rounded-md bg-green-400 py-0.5 px-3">Show</a> --}}
                                        <a href="{{ route('dashboard.users.edit', $user) }}"
                                            class="text-white rounded-md bg-blue-400 py-0.5 px-5 font-semibold">Edit</a>
                                        <form action="{{ route('dashboard.users.destroy', $user) }}" method="post"
                                            class="text-white rounded-md bg-red-400 py-0.5 px-2 font-semibold">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <script>
            window.location = "/dashboard";
        </script>
    @endif
</x-layouts.admin>
