@extends('layouts.main')

@section('main')
<div id="create-news-form">
    <div class="container">
        <form action="/news/store" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Post News</h1>
            <div class="form-group">
                <label for="title">News Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="News Title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="3" class="form-control" placeholder="News Description"></textarea>
            </div>
            <div class="form-group">
                <label for="content">News Body</label>
                <textarea name="content" id="content" rows="5" class="form-control" placeholder="News Content"></textarea>
            </div>
            <div class="form-group">
                <label for="cover_image">News Cover Image</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="cover_image">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="cover_image">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="mt-4 btn-block custom-btn">Upload</button>
        </form>
    </div>
</div>
@endsection

@section('add-js')
<script src="https://cdn.tiny.cloud/1/7vbl7oks5lj5prw6x5zpxh9q4fpa0xcqh5gzz4hja1d626o0/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: "table image link imagetools autoresize",
        menu: {
            format: { 
                title: "Format", 
                items: "forecolor backcolor" 
            }
        },
        toolbar: "undo redo forecolor backcolor link image",
        image_dimensions: false,
        image_class_list: [
            {title: 'Responsive', value: 'img-responsive'}
        ],
        file_picker_types: 'image media',
        image_uploadtab: true,
        images_upload_base_path: '/storage/news/images',
        images_upload_url: '/news/upload',
        images_upload_credentials: true,
        automatic_uploads: true,
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/news/upload');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('media', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        }
    });
</script>
@endsection