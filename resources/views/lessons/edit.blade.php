<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            編集画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                        <form action="{{ route('lessons.update', $lesson) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container px-5 py-24 mx-auto">
                                <div class="flex flex-wrap -m-2">

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="student" class="leading-7 text-sm text-gray-600 mr-3">生徒</label>
                                            <select name="student">
                                                @foreach($students as $student)
                                                <option value="{{ $student->id }}" {{ $lesson->student_id == $student->id ? 'selected' : '' }}>
                                                    {{ $student->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('student')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="subject" class="leading-7 text-sm text-gray-600 mr-3">科目</label>
                                            <select name="subject">
                                                @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}" {{ $lesson->subject_id == $subject->id ? 'selected' : '' }}>
                                                    {{ $subject->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="teacher" class="leading-7 text-sm text-gray-600 mr-3">教師</label>
                                            <select name="teacher">
                                                @foreach($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" {{ $lesson->teacher_id == $teacher->id ? 'selected' : '' }}>
                                                    {{ $teacher->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('teacher')" class="mt-2" />
                                        </div>
                                    </div>


                                    <div class="p-2 w-full">
                                        <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>