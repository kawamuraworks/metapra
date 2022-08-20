<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿の新規作成
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="post" action="{{ route('meta.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate >
                @csrf
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="title" class="font-semibold leading-none mt-4">件名</label>
                        <input type="text" name="title"
                            class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title"
                            placeholder="Enter Title">
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold leading-none mt-4">本文</label>
                    <textarea name="body" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="body"
                        cols="30" rows="10"></textarea>
                </div>

                <div class="w-full flex flex-col">
                    <label for="image" class="font-semibold leading-none mt-4">画像 </label>
                    <div>
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <button class="mt-4">
                    送信する
                </button>

            </form>
        </div>
    </div>

    {{-- <form method="post" action="{{ route('admin.store') }}" enctype="multipart/form-data" class="needs-validation"
    novalidate>
    @csrf
    <!-- 画像テーブル用（右） -->
    <div class="col-md-5">
        <div id="images" class="col-sm-12">
            <label for="image_0" class="form-label">タイトル・タグ登録</label>
            <p class="mb-1">1枚目</p>
            <input type="file" class="form-control" id="image_0" placeholder="画像を登録してください" name="image_[]"
                required>
            <input type="text" class="form-control mt-2" id="image_0" placeholder="タイトル入力"
                value="{{ old('img_content_[]') }}" name="title" required>
            <span class="invalid-feedback">タイトル・タグ登録</span>
            <input type="text" class="form-control mt-2" id="image_0" placeholder="タグ1"
                value="{{ old('img_content_[]') }}" name="img_content_[]-1" required>
            <span class="invalid-feedback">タイトル・タグ登録</span>
            <input type="text" class="form-control mt-2" id="image_0" placeholder="タグ2"
                value="{{ old('img_content_[]') }}" name="img_content_[]-2" required>
            <span class="invalid-feedback">タイトル・タグ登録</span>
        </div>


        <div class="col-md-4 mt-3">
            <input class="btn btn-primary" type="button" value="追加" onclick="addImage()" />
            <input class="btn btn-outline-primary" type="button" value="削除" onclick="deleteImage()" />
        </div>

    </div>
    <!-- 画像テーブル用（右）ここまで -->
    </div>

    <div class="row col-md-12 px-5">
        <button class="col-md-2 btn btn-primary btn-lg my-5 me-3" type="submit">登録する</button>
        <a class="col-md-2 btn btn-outline-primary btn-lg my-5" href="{{ url('/admin/select') }}">実績変更選択</a>
    </div>
</form> --}}


</x-app-layout>
