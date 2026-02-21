<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Portfolio Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Profile Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Profile Information</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Update your basic profile details.</p>
                </header>

                <form method="post" action="{{ route('dashboard.profile.update') }}" class="mt-6 space-y-4"
                    enctype="multipart/form-data">
                    @csrf
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $profile->name)" />
                        </div>
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="old('title', $profile->title)" />
                        </div>
                    </div>
                    <div>
                        <x-input-label for="bio" :value="__('Bio')" />
                        <textarea name="bio" id="bio" rows="4"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('bio', $profile->bio) }}</textarea>
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save Profile') }}</x-primary-button>
                        @if (session('status') === 'profile-updated')
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Skills Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Skills</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage your technical skills.</p>
                </header>

                <div class="mt-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                        @foreach($skills as $skill)
                            <div
                                class="flex justify-between items-center p-3 border dark:border-gray-700 rounded-lg dark:text-gray-300">
                                <span>{{ $skill->name }} ({{ $skill->level }}%)</span>
                                <form method="post" action="{{ route('dashboard.skills.delete', $skill) }}"
                                    onsubmit="return confirm('Delete skill?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <form method="post" action="{{ route('dashboard.skills.add') }}" class="flex gap-4">
                        @csrf
                        <x-text-input name="name" placeholder="Skill Name" class="flex-1" required />
                        <x-text-input name="level" type="number" placeholder="Level %" class="w-24" required />
                        <x-primary-button>Add Skill</x-primary-button>
                    </form>
                </div>
            </div>

            <!-- Projects Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Projects</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Add or remove your projects.</p>
                </header>

                <div class="mt-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        @foreach($projects as $project)
                            <div class="p-4 border dark:border-gray-700 rounded-lg dark:text-gray-300">
                                <h3 class="font-bold">{{ $project->title }}</h3>
                                <p class="text-sm text-gray-500">{{ $project->tags }}</p>
                                <form method="post" action="{{ route('dashboard.projects.delete', $project) }}" class="mt-2"
                                    onsubmit="return confirm('Delete project?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:underline">Delete Project</button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <form method="post" action="{{ route('dashboard.projects.add') }}" class="space-y-4">
                        @csrf
                        <x-text-input name="title" placeholder="Project Title" class="block w-full" required />
                        <textarea name="description" placeholder="Project Description"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md"></textarea>
                        <x-text-input name="tags" placeholder="Tags (comma separated)" class="block w-full" />
                        <x-primary-button>Add Project</x-primary-button>
                    </form>
                </div>
            </div>

            <!-- Experience Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Experience</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage your work history.</p>
                </header>

                <div class="mt-6">
                    <div class="space-y-4 mb-6">
                        @foreach($experiences as $exp)
                            <div
                                class="flex justify-between items-center p-3 border dark:border-gray-700 rounded-lg dark:text-gray-300">
                                <div>
                                    <strong>{{ $exp->position }}</strong> at {{ $exp->company }}
                                    <p class="text-xs text-gray-500">{{ $exp->start_date }} -
                                        {{ $exp->end_date ?? 'Present' }}</p>
                                </div>
                                <form method="post" action="{{ route('dashboard.experience.delete', $exp) }}"
                                    onsubmit="return confirm('Delete experience?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <form method="post" action="{{ route('dashboard.experience.add') }}" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <x-text-input name="company" placeholder="Company" required />
                            <x-text-input name="position" placeholder="Position" required />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <x-text-input name="start_date" placeholder="Start Date (e.g. Oct 2023)" required />
                            <x-text-input name="end_date" placeholder="End Date (or Present)" />
                        </div>
                        <textarea name="description" placeholder="Description"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md"></textarea>
                        <x-primary-button>Add Experience</x-primary-button>
                    </form>
                </div>
            </div>

            <!-- Education Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Education</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage your academic history.</p>
                </header>

                <div class="mt-6">
                    <div class="space-y-4 mb-6">
                        @foreach($educations as $edu)
                            <div
                                class="flex justify-between items-center p-3 border dark:border-gray-700 rounded-lg dark:text-gray-300">
                                <div>
                                    <strong>{{ $edu->degree }}</strong> at {{ $edu->institution }}
                                    <p class="text-xs text-gray-500">{{ $edu->start_date }} - {{ $edu->end_date }}</p>
                                </div>
                                <form method="post" action="{{ route('dashboard.education.delete', $edu) }}"
                                    onsubmit="return confirm('Delete education?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <form method="post" action="{{ route('dashboard.education.add') }}" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <x-text-input name="institution" placeholder="Institution" required />
                            <x-text-input name="degree" placeholder="Degree" required />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <x-text-input name="start_date" placeholder="Start Date" required />
                            <x-text-input name="end_date" placeholder="End Date" required />
                        </div>
                        <textarea name="description" placeholder="Description"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md"></textarea>
                        <x-primary-button>Add Education</x-primary-button>
                    </form>
                </div>
            </div>

            <!-- Messages Section -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Messages</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Check who's reaching out.</p>
                </header>

                <div class="mt-6 space-y-4">
                    @forelse($messages as $msg)
                        <div
                            class="p-4 border {{ $msg->is_read ? 'dark:border-gray-700' : 'border-indigo-500 border-2' }} rounded-lg dark:text-gray-300">
                            <div class="flex justify-between">
                                <span class="font-bold">{{ $msg->name }} ({{ $msg->email }})</span>
                                <span class="text-xs text-gray-500">{{ $msg->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="mt-2">{{ $msg->content }}</p>
                            @if(!$msg->is_read)
                                <form method="post" action="{{ route('dashboard.messages.read', $msg) }}" class="mt-2">
                                    @csrf
                                    <button class="text-indigo-500 hover:underline text-sm">Mark as Read</button>
                                </form>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500">No messages yet.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>