<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            詳細画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-5 mx-auto">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="name" class="leading-7 text-sm text-gray-600">氏名</label>
                                        <div id="name" name="name" class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            {{ $student->name }}
                                        </div>
                                    </div>
                                </div>
                                <!-- 編集フォーム -->
                                <form method="get" action="{{ route('students.edit', $student) }}">
                                    <div class="p-2 w-full">
                                        <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</button>
                                    </div>
                                </form>
                                <!-- 削除フォーム -->
                                <form id="delete_{{ $student->id }}" method="post" action="{{ route('students.destroy', $student) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="p-2 w-full">
                                        <button type="button" data-id="{{ $student->id }}" onclick="deletePost(this)" class="flex mx-auto text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg">削除する</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>

</x-app-layout>