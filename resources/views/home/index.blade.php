@extends('layouts.basic')

@section('headScripts')
    <script type="text/javascript" src="js/home-data.js"></script>
@endsection

@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="uppercase text-center text-3xl font-bold leading-tight text-gray-900">
            Age Test
        </h1>
    </div>
</header>
<main>
    <div x-data="homeData()" x-init="$watch('user.name', value => displayName = '👋 ' + value)" class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
        <div class="p-6 text-left md:text-center lg:text-center">
            <p class="mx-auto-w-2xl text-2xl text-gray-500 lg:mx-auto">
                Impress your friends and calculate your date of birth down to years, days and hours.
            </p>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900" x-text="displayName"></h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500" x-show="age.age">
                    Some cool age related facts about you.
                </p>
            </div>
            <div class="border-t border-gray-200" x-show="age.age">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Readable
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" x-text="age.human"></dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Age in months
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" x-text="age.months"></dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Age in days
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" x-text="age.days"></dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Age in hours
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" x-text="age.hours"></dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Age in minutes
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" x-text="age.minutes"></dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Age in seconds
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2" x-text="age.seconds"></dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="border-4 border-dashed border-gray-200 rounded-lg mt-4">
            <div class="bg-white rounded px-8 pt-6 pb-4 mb-4 flex flex-col my-2">
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Name
                        </label>
                        <input x-model.string="user.name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Joe Bloggs">
                        <p class="text-red text-xs italic" x-show="errors.name === null">Please fill out this field.</p>
                        <p class="text-red-800 text-md italic" x-show="errors.name !== null" x-text="errors.name"></p>
                    </div>
                </div>
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-1/2 px-3 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                            Date of Birth
                        </label>
                        <input x-model.string="user.dob" required id="dob" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Y-m-d H:i">
                        <p class="text-xs italic" x-show="errors.dob === null">Please fill out this field.</p>
                        <p class="text-red-800 text-md italic" x-show="errors.dob !== null" x-text="errors.dob"></p>
                    </div>
                </div>
            </div>
            <div class="w-auto bg-gray-200">
                <div class="p-3 w-auto text-right">
                    <button @click="submitForm()" class="justify-center inline-flex w-full md:w-auto lg:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        <svg x-show="submitting" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Calculate
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
