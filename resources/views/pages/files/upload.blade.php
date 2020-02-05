@extends('layouts.main')

@section('main')
<div id="file-upload" class="mt-5 py-5">
    <div class="container">
        <div class="section-title mt-3">
            <div>
                <h1>Upload File</h1>
            </div>
            <p>multiple files upload are not supported in these days</p>
        </div>
        <form action="{{ Route('files.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="path" value="{{ Request::input('path') }}">
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
