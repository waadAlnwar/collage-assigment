<div>


    <div class=" bg-indigo-50 h-screen">
        <div class="max-w-7xl mx-auto text-center py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block"> تأكيد الدفع </span>
                {{-- <span class="block"></span> --}}
            </h2>
            <div class="mt-8 flex justify-center">
                <div class="inline-flex rounded-md shadow">
                    <div class="">
                        @if ($this->ref_route)
                            <h2 class="text-5xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                                <span class="block"> الرقم المرجعي {{ $this->ref_route }} </span>
                            </h2>
                        @else
                            <label for="ref" class="block text-sm font-medium text-gray-700"> ادخل الرقم المرجعي
                            </label>
                            <div class="mt-1">
                                <input id="ref" name="ref" type="number" wire:model="ref"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                @error('ref')
                                    <small class=" text-red-500"> {{ $message }}</small>
                                @enderror
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-center">
                    <button type="button" wire:click.prevent="pay"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">تم
                        الدفع</button>
                </div>
            </div>

            @if ($this->message)
                <p class="mt-5 text-red-500">{{ $message }}</p>
            @endif


        </div>
    </div>


</div>
