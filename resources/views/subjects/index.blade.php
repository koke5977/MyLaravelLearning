<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            科目一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('subjects.create') }}" class="text-blue-500">新規登録</a>

                    <form class="mb-8" method="get" action="{{ route('subjects.index') }}">
                        <input type="text" name="search" placeholder="検索">
                        <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索する</button>
                    </form>

                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">科目名</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">登録日</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                <tr>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $subject->id }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $subject->name }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $subject->created_at }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('subjects.show', $subject) }}" class="text-blue-500">詳細を見る</td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $subjects->links() }}
        </div>
    </div>
</x-app-layout>