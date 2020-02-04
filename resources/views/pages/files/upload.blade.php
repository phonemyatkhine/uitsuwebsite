@extends('layouts.main')

@section('main')
<div id="file-upload" class="mt-5 py-5">
    <div class="container">
        <form action="{{ Route('files.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section-title mt-3">
                <div>
                    <h1>File upload</h1>
                </div>
                <p>Due to some difficulites, multiple file are not supported yet</p>
            </div>
            <div class="form-group">
                <label for="name">file name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="file name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="3" class="form-control" placeholder="File Description"></textarea>
            </div>
            <div class="form-group">
                <label for="tag">file Tags</label>
                <input type="text" name="tag" id="tag" class="form-control" placeholder="file Tags (Seperate with Comma)">
            </div>
            <div class="form-group">
                <label for="file">File to upload</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="file">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="file" required>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="mt-4 btn-block custom-btn">Upload</button>
        </form>
    </div>
</div>
@endsection
