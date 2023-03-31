<x-app-layout>
    <div class="md:grid md:grid-cols-3 pt-10">
        <div class="col-span-1">

        </div>
        <div class="col-span-1 m-4 md:m-0">
            <form method="POST" action="">
                @csrf

                <!-- Sender -->
                <div>
                    <x-input-label for="sender" value="Pengirim" />
                    <x-text-input id="sender" class="block mt-1 w-full" type="text" name="sender" :value="old('sender')" required autofocus autocomplete="sender" />
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>

                <!-- Receive -->
                <div>
                    <x-input-label for="recipient" value="Penerima: " />
                    <x-text-input id="recipient" class="block mt-1 w-full" type="text" name="recipient" :value="old('recipient')" required autofocus autocomplete="recipient" />
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>

                <!-- greetings -->
                <div>
                    <x-input-label for="message" value="Kalimat ucapan: " />
                    <textarea id="message" name="message" :value="old('message')" required autofocus autocomplete="message" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" rows="5"></textarea>
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>

                <!-- Upload Image -->
                <div class="flex items-center space-x-6 my-6">
                    <div class="shrink-0">
                        <img class="h-24 w-24 object-cover rounded-full" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" alt="Current profile photo" />
                    </div>
                    <label class="block">
                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" name="photo" class="block w-full text-sm text-slate-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-violet-100 file:text-violet-700
                          hover:file:bg-violet-100
                        "
                        required
                        />
                    </label>
                </div>

                <div class="mt-4">
                    <x-primary-button
                    class="block w-full">
                        Generate
                    </x-primary-button>
                </div>
            </form>

        </div>
        <div class="col-span-1">

        </div>
    </div>
</x-app-layout>
