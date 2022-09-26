<div>
    <div class="container mx-auto">

        <form class="space-y-8 divide-y divide-gray-200 px-20 py-5" wire:submit.prevent="save">
            <div class="space-y-8 divide-y divide-gray-200">


                <div class="pt-8">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">استخراج شهادة</h3>
                        <p class="mt-1 text-sm text-gray-500">املا الفورم التالي</p>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-12">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700"> الاسم الاول
                            </label>
                            <div class="mt-1">
                                <input type="text" name="first-name" id="first-name" wire:model="first_name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                @error('first_name')
                                    <small class=" text-red-500"> {{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="second-name" class="block text-sm font-medium text-gray-700"> الاسم الثاني
                            </label>
                            <div class="mt-1">
                                <input type="text" name="second-name" id="second-name" wire:model="second_name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                @error('second_name')
                                    <small class=" text-red-500"> {{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="third-name" class="block text-sm font-medium text-gray-700"> الاسم الثالث
                            </label>
                            <div class="mt-1">
                                <input type="text" name="third-name" id="third-name" wire:model="third_name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                @error('third_name')
                                    <small class=" text-red-500"> {{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="fourth-name" class="block text-sm font-medium text-gray-700"> الاسم الرابع
                            </label>
                            <div class="mt-1">
                                <input type="text" name="fourth-name" id="fourth-name" wire:model="fourth_name"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                @error('fourth_name')
                                    <small class=" text-red-500"> {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="std_id" class="block text-sm font-medium text-gray-700"> الرقم الجامعي
                            </label>
                            <div class="mt-1">
                                <input id="std_id" name="std_id" type="text" wire:model="std_id"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                @error('std_id')
                                    <small class=" text-red-500"> {{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="gpa" class="block text-sm font-medium text-gray-700"> المعدل
                            </label>
                            <div class="mt-1">
                                <input id="gpa" name="gpa" type="number" wire:model="gpa"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">

                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="yaer" class="block text-sm font-medium text-gray-700"> سنة التخرج
                            </label>
                            <div class="mt-1">
                                <input id="yaer" name="yaer" type="number" wire:model="year"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="facutly" class="block text-sm font-medium text-gray-700">القسم</label>
                            <select id="facutly" name="facutly" wire:model="facutly"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option selected> اختر قسم</option>
                                @foreach ($facutlies as $facutly)
                                    <option value="{{ $facutly->id }}"> {{ $facutly->name }} </option>
                                @endforeach
                            </select>
                            @error('facutly')
                                <small class=" text-red-500"> {{ $message }}</small>
                            @enderror
                        </div>


                        <div class="sm:col-span-3">
                            <label for="major" class="block text-sm font-medium text-gray-700">التخصص</label>
                            <select id="major" name="major" wire:model="major"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option>اختر تخصص</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}"> {{ $major->name }} </option>
                                @endforeach
                            </select>
                            @error('major')
                                <small class=" text-red-500"> {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="degree" class="block text-sm font-medium text-gray-700">الدرجة العلمية</label>
                            <select id="degree" name="degree" wire:model="degree"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option>اختر الدرجة</option>
                                @foreach ($degrees as $degree)
                                    <option value="{{ $degree->id }}"> {{ $degree->name }} </option>
                                @endforeach
                            </select>
                            @error('degree')
                                <small class=" text-red-500"> {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="sm:col-span-3">
                            <label for="gender" class="block text-sm font-medium text-gray-700">الجنس</label>
                            <select id="gender" name="gender" wire:model="gender"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option>اختر الجنس</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}"> {{ $gender->name }} </option>
                                @endforeach
                            </select>
                            @error('gender')
                                <small class=" text-red-500"> {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="sm:col-span-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-4">
                            <div class="relative flex items-start py-4">
                                <div class="min-w-0 pl-2 text-sm">
                                    <label for="ce_arabic" class="font-medium text-gray-700 select-none">نسخة
                                        عربي</label>
                                </div>
                                <div class="ml-3 flex items-center h-5">
                                    <input id="ce_arabic" name="ce_arabic" type="checkbox" wire:model="arabic"
                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                            </div>

                            <div class="relative flex items-start py-4">
                                <div class="min-w-0 pl-2 text-sm">
                                    <label for="ce_english" class="font-medium text-gray-700 select-none">نسخة
                                        انجليزي</label>
                                </div>
                                <div class="ml-3 flex items-center h-5">
                                    <input id="ce_english" name="ce_english" type="checkbox" wire:model="english"
                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                            </div>

                            <div class="relative flex items-start py-4">
                                <div class="min-w-0 pl-2 text-sm">
                                    <label for="details_arabic" class="font-medium text-gray-700 select-none">تفاصيل
                                        عربي</label>
                                </div>
                                <div class="ml-3 flex items-center h-5">
                                    <input id="details_arabic" name="details_arabic" type="checkbox"
                                        wire:model="details_arabic"
                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                            </div>

                            <div class="relative flex items-start py-4">
                                <div class="min-w-0 pl-2 text-sm">
                                    <label for="details_english" class="font-medium text-gray-700 select-none">تفاصيل
                                        انجليزي</label>
                                </div>
                                <div class="ml-3 flex items-center h-5">
                                    <input id="details_english" name="details_english" type="checkbox"
                                        wire:model="details_english"
                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700"> اثبات شخصية</label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>تحميل ملف</span>
                                            <input id="file-upload" name="file-upload" type="file"
                                                wire:model="attach" class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500"> JPG </p>
                                </div>
                            </div>
                            @error('attach')
                                <small class=" text-red-500"> {{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                </div>


            </div>

            <div class="pt-5">
                <div class="flex justify-start">
                    <button type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">حفظ</button>
                </div>
            </div>
        </form>

    </div>

</div>
