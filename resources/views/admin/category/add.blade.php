@extends('layout.admin.main')

@section('content')
    <!-- ===== Main Content Start ===== -->
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                    Add Categories
                </h2>

                <nav>
                    <ol class="flex items-center gap-2">
                        <li>
                            <a class="font-medium" href="index.html">Category /</a>
                        </li>
                        <li class="font-medium text-primary">Add</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->

            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div
                    class="rounded-sm border border-stroke pb-6 bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-black dark:text-white">
                            Categories | Sub Categories
                        </h3>
                    </div>
                    <div class="flex sm:flex-col gap-5.5 p-6.5">
                        <div class="w-1/2 sm:w-full">

                            {{-- input name category --}}
                            <div class="mb-5.5">
                                <label for="category-name"
                                    class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Name
                                    <span class="text-meta-1">*</span>
                                </label>
                                <input type="text" placeholder="Category | Sub Category" name="name"
                                    id="category-name"
                                    class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                                <div class="ml-4 text-meta-1">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            {{-- input image category --}}
                            <div class="mb-5.5">
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Image
                                </label>
                                <input type="file" name="image"
                                    class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary" />
                            </div>

                            {{-- input description category --}}
                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Description
                                </label>
                                <textarea rows="1" placeholder="Category | Sub Category" name="description"
                                    class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                            </div>

                        </div>

                        <div class="w-1/2 sm:w-full">

                            {{-- select status category --}}
                            <div class="mb-5.5">
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Status
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                                    <select name="status"
                                        class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                        :class="isOptionSelected && 'text-black dark:text-white'"
                                        @change="isOptionSelected = true">
                                        <option value="active" selected class="text-success">Active</option>
                                        <option value="upcoming" class="text-warning">Upcoming</option>
                                        <option value="inactive" class="text-danger">InActive</option>
                                    </select>
                                    <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.8">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                    fill="#637381"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            {{-- select parent category --}}
                            <div>
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                    Parent Category
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                                    <select name="parent_id"
                                        class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                        :class="isOptionSelected && 'text-black dark:text-white'"
                                        @change="isOptionSelected = true">
                                        <option value="" class="text-body">Primary Category</option>

                                        @forelse ($parents as $parent)
                                            @if ($parent->parent_id == null)
                                                <option value="{{ $parent->id }}" class="text-body">{{ $parent->name }}
                                                </option>
                                            @endif
                                        @empty
                                        @endforelse()

                                    </select>
                                    <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.8">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                    fill="#637381"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit"
                        class="flex justify-center rounded bg-primary px-7 py-2 -ml-6.5 font-medium text-gray hover:bg-opacity-90">
                        Supmit
                    </button>
            </form>

        </div>
    </main>
@endsection
