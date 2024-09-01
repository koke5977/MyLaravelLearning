<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            履歴
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- 削除フォーム -->
                    <form action="{{ route('histories.destroy', '0') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-pink-500">全て削除</button>
                    </form>
                    <div class=" lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">生徒</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">科目</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">教師</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">完了日</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($histories as $history)
                                <tr>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $history->id }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $history->student }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $history->subject }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $history->teacher }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $history->created_at }}</td>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>