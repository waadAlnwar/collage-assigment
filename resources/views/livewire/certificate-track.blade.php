<div>


    <div class=" bg-indigo-50 h-screen">
        <div class="max-w-7xl mx-auto text-center py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">تتبع شهادتك</span>
                {{-- <span class="block"></span> --}}
            </h2>


            @if ($this->ref_route)
                <div class="rounded-md text-center bg-green-50 p-4 mt-3">
                    <div class="flex justify-center">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: solid/check-circle -->
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-center font-medium text-green-800">تم الدفع</p>
                        </div>

                    </div>
                </div>
            @endif



            <div class="mt-8 flex justify-center">
                <div class="inline-flex rounded-md shadow">
                    <div class="">
                        <label for="ref" class="block text-sm font-medium text-gray-700"> ادخل الرقم المرجعي
                        </label>
                        <div class="mt-1">
                            <input id="ref" name="ref" type="number" wire:model="ref"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            @error('ref')
                                <small class=" text-red-500"> {{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-center">
                    <button type="button" wire:click.prevent="getData"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">تتبع</button>
                </div>
            </div>

            @if ($this->message)
                <p class="mt-5 text-red-500">{{ $message }}</p>
            @endif

            @if ($this->certificate)
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg mt-5">
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">الاسم</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $this->certificate->first_name }} {{ $this->certificate->second_name }}
                                    {{ $this->certificate->third_name }} {{ $this->certificate->fourth_name }}</dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">تاريخ الطلب</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ date_format($this->certificate->created_at, 'Y/m/d') }}</dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">الحالة</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{-- {{ $this->certificate->status->label }}
                                    <p class="text-gray-600">{{ $this->certificate->status->description }}</p> --}}
                                    {{ $this->certificate->status->description }}
                                </dd>
                            </div>

                        </dl>
                    </div>
                </div>
            @endif
        </div>
    </div>


</div>
