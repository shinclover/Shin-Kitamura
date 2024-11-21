<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
          写真ギャラリー
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="background-color: #F3FEB8;" class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="gallery">
                        @foreach($image_urls as $image)
                            <div>
                                @if($image->image_url == null)
                                    <div></div>
                                @elseif($image->image_url != null)
                                    <a href="{{ route('post.show1', $image->id) }}">
                                        <img src="{{ $image->image_url }}" alt="Image for {{ $image->title }}" class="custom-image-size rounded shadow-md">
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .custom-image-size {
        width: 200px; /* お好みの幅に設定 */
        height: auto; /* アスペクト比を保つ */
    }

    .gallery {
        display: flex;
        flex-wrap: wrap; /* 横に並び、次の行に折り返す */
        justify-content: center; /* 中央に配置 */
        gap: 16px; /* 画像の間にスペースを設定 */
    }

    h2 {
        text-align: center;
    }
    @media screen and (max-width: 600px) {
    body {
        font-size: 14px;
    }

    /* 画像のサイズを変更 */
    img {
        max-width: 100%;
        height: auto;
    }

    /* ナビゲーションバーを縦並びに */
    .navbar {
        display: block;
    }
}
</style>
