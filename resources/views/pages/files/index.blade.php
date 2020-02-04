@extends('layouts.main')

@section('main')
<div id="files-section" class="py-5 mt-5">
    <div class="container">
        <div class="section-title mt-3">
            <div>
                <h1>Files Databases</h1>
            </div>
            <p>uploaded files are listed here.</p>
            <div class="view-more-btn">
                <a href="{{ Route('files.upload') }}" class="custom-btn">upload</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Filename</th>
                    <th scope="col">Description</th>
                    <th scope="col">Uploaded by</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($files))
                @foreach($files as $id => $file)
                <tr>
                    <th scope="row">{{ $id + 1 }}</th>
                    <td>{{ $file->name }}</td>
                    <td>{{ $file->description }}</td>
                    <td>{{ App\User::where('id', $file->owner)->first()->name }}</td>
                    <td>
                        <a class="fas fa-eye px-2" href="{{ asset("/files/".$file->id."/view") }}" target="_blank"></a>
                        <a class="fas fa-link px-2" href="" id="copy_url_{{ $file->id }}" data-toggle="tooltip" data-placement="top" title="click to copy"></a>
                        <a class="fas fa-download px-2" href="/files/{{ $file->id }}/download"></a>
                        <a class="fas fa-trash px-2 {{ $file->owner == Auth::user()->id ? '' : 'disabled' }}" href="#" onclick="event.preventDefault();
                            document.getElementById('delete-form-{{ $file->id }}').submit();"></a>
                        <form id="delete-form-{{ $file->id }}" action="/files/{{ $file->id }}/delete" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $file->id }}">
                        </form>
                    </td>
                    <input type="text" style="position: fixed; top: -500px; left: -500px" id="url_{{ $file->id }}" value="{{ asset("/files/".$file->id."/view") }}">
                    <script>
                        document.getElementById("copy_url_{{ $file->id }}").addEventListener('click', (e) => {
                            e.preventDefault();
                            var copyText = document.getElementById("url_{{ $file->id }}");
                            copyText.select();
                            copyText.setSelectionRange(0, 99999);
                            document.execCommand("copy");
                        });
                    </script>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
