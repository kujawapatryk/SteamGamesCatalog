@extends('layouts.main')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex items-center mb-4">
            <i class="fas fa-table mr-1 text-xl"></i>
            <h2 class="text-xl font-bold">Lista użytkowników</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-300 text-left text-sm font-bold uppercase">Lp</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-left text-sm font-bold uppercase">Id</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-left text-sm font-bold uppercase">Nick</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-left text-sm font-bold uppercase">Opcje</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th class="py-2 px-4 border-t border-gray-300 text-left text-sm font-bold uppercase">Lp</th>
                    <th class="py-2 px-4 border-t border-gray-300 text-left text-sm font-bold uppercase">Id</th>
                    <th class="py-2 px-4 border-t border-gray-300 text-left text-sm font-bold uppercase">Nick</th>
                    <th class="py-2 px-4 border-t border-gray-300 text-left text-sm font-bold uppercase">Opcje</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 text-sm">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-sm">{{ $user['id'] }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-sm">{{ $user['name'] }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-sm">

                                <a href="{{ route('user.show', ['userId' => $user['id']]) }}" class="text-blue-500 hover:underline">Szczegóły</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
