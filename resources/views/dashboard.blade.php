
<style>
    .custom-image-size {
        width: 150px; /* お好みの幅に設定 */
        height: auto; /* アスペクト比を保つ */
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div style="background-color: #F3FEB8;" class="overflow-hidden shadow-sm sm:rounded-lg">
</div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                        @foreach($image_urls as $image_url)
                            <div class="flex justify-center">
　　　　　　　　　　　　　　<img src="{{ $image_url }}" alt="" class="custom-image-size rounded shadow-md">                            
　　　　　　　　　　　　　　</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
