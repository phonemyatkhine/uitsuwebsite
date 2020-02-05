@extends('layouts.main')
@php
    if(isset($_GET['path']) && $_GET['path'] != "/") {
        $path = $_GET['path'];
    } else {
        $path = "";
    }
    $base = realpath(storage_path("/app/files"));
    $listed_path = str_replace($base, "", realpath(storage_path("/app/files").$path));
    if(trim($listed_path) == "") {
        $listed_path = "/";
    }
    $location = explode('/', $listed_path);
    $hrefPath = '/';
    $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/x-icon','image/svg+xml'];
@endphp
@section('main')
<div id="files-section" class="py-5 mt-5">
    <div class="container">
        <div class="section-title mt-3">
            <div>
                <h1>Files Databases</h1>
            </div>
            <p>uploaded files are listed here.</p>
            <div class="view-more-btn">
                <a href="/files/upload?path={{ $listed_path }}" class="custom-btn">upload</a>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="bg-gray">
            <ol class="breadcrumb">
                <script>
                var newURL = location.href.replace(/(path=).+/, '$1' + "{{ $listed_path }}");
                history.replaceState("", "", newURL);
                </script>
                <li class="breadcrumb-item"><a href="/files?path={{ $hrefPath }}">HOME</a></li>
                @foreach ($location as $loc)
                    @if(trim($loc) != "")
                    @php
                    $hrefPath .= ($loc.'/');
                    @endphp
                    <li class="breadcrumb-item"><a href="/files?path={{ $hrefPath }}">{{ $loc }}</a></li>
                    @endif
                @endforeach
            </ol>
        </nav>
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Filename</th>
                </tr>
            </thead>
            <tbody>
                @if(count($list))
                    @foreach($list as $count => $file)
                    <tr>
                        @if(is_dir(storage_path("app/files".$path."/".$file)))
                            @if($file != ".")
                            <td>
                                <a href="/files/?path={{ $path.'/'.$file }}"><i class="fas fa-folder"></i>&nbsp;&nbsp;{{ $file }}</a>
                                <div class="d-inline-block float-right">
                                    <a class="fas fa-link px-2" href="" id="copy_url_{{ $count }}" data-toggle="tooltip" data-placement="top" title="click to copy"></a>
                                    <a class="fas fa-download px-2" href="{{ url("/files/download?path=".$path.'/'.$file) }}"></a>
                                    @if($file != "..")
                                    <a class="fas fa-trash px-2" href="#" onclick="
                                        event.preventDefault();
                                        if(confirm('Are you sure to delete?')){document.getElementById('delete-form-{{ $count }}').submit();}"
                                        ></a>
                                    <form id="delete-form-{{ $count }}" action="/files/delete" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="path" value="{{ $path.'/'.$file }}">
                                        <input type="hidden" name="redirectpath" value="{{ $listed_path }}">
                                    </form>
                                    @endif
                                    <input type="text" style="position: fixed; top: -500px; left: -500px" id="url_{{ $count }}" value="{{ url("/files/view?path=".$path.'/'.$file) }}">
                                    <script>
                                        document.getElementById("copy_url_{{ $count }}").addEventListener('click', (e) => {
                                            e.preventDefault();
                                            var copyText = document.getElementById("url_{{ $count }}");
                                            copyText.select();
                                            copyText.setSelectionRange(0, 99999);
                                            document.execCommand("copy");
                                        });
                                    </script>
                                </div>
                            </td>
                            @endif
                        @elseif(in_array(mime_content_type(storage_path("app/files".$path."/".$file)), $allowedMimeTypes))
                            <td>
                                <a href="/files/view?path={{ $path.'/'.$file }}"><i class="far fa-image"></i>&nbsp;&nbsp;{{ $file }}</a>
                                <div class="d-inline-block float-right">
                                    <a class="fas fa-link px-2" href="" id="copy_url_{{ $count }}" data-toggle="tooltip" data-placement="top" title="click to copy"></a>
                                    <a class="fas fa-download px-2" href="{{ url("/files/download?path=".$path.'/'.$file) }}"></a>
                                    <a class="fas fa-trash px-2" href="#" onclick="
                                        event.preventDefault();
                                        if(confirm('Are you sure to delete?')){document.getElementById('delete-form-{{ $count }}').submit();}"
                                        ></a>
                                    <form id="delete-form-{{ $count }}" action="/files/delete" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="path" value="{{ $path.'/'.$file }}">
                                        <input type="hidden" name="redirectpath" value="{{ $listed_path }}">
                                    </form>
                                    <input type="text" style="position: fixed; top: -500px; left: -500px" id="url_{{ $count }}" value="{{ url("/files/view?path=".$path.'/'.$file) }}">
                                    <script>
                                        document.getElementById("copy_url_{{ $count }}").addEventListener('click', (e) => {
                                            e.preventDefault();
                                            var copyText = document.getElementById("url_{{ $count }}");
                                            copyText.select();
                                            copyText.setSelectionRange(0, 99999);
                                            document.execCommand("copy");
                                        });
                                    </script>
                                </div>
                            </td>
                        @elseif(mime_content_type(storage_path("app/files".$path."/".$file)) == "application/pdf" )
                            <td>
                                <a href="/files/view?path={{ $path.'/'.$file }}"><i class="far fa-file-pdf"></i>&nbsp;&nbsp;{{ $file }}</a>
                                <div class="d-inline-block float-right">
                                    <a class="fas fa-link px-2" href="" id="copy_url_{{ $count }}" data-toggle="tooltip" data-placement="top" title="click to copy"></a>
                                    <a class="fas fa-download px-2" href="{{ url("/files/download?path=".$path.'/'.$file) }}"></a>
                                    <a class="fas fa-trash px-2" href="#" onclick="
                                        event.preventDefault();
                                        if(confirm('Are you sure to delete?')){document.getElementById('delete-form-{{ $count }}').submit();}"
                                        ></a>
                                    <form id="delete-form-{{ $count }}" action="/files/delete" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="path" value="{{ $path.'/'.$file }}">
                                        <input type="hidden" name="redirectpath" value="{{ $listed_path }}">
                                    </form>
                                    <input type="text" style="position: fixed; top: -500px; left: -500px" id="url_{{ $count }}" value="{{ url("/files/view?path=".$path.'/'.$file) }}">
                                    <script>
                                        document.getElementById("copy_url_{{ $count }}").addEventListener('click', (e) => {
                                            e.preventDefault();
                                            var copyText = document.getElementById("url_{{ $count }}");
                                            copyText.select();
                                            copyText.setSelectionRange(0, 99999);
                                            document.execCommand("copy");
                                        });
                                    </script>
                                </div>
                            </td>
                        @else
                            <td>
                                <a href="/files/view?path={{ $path.'/'.$file }}"><i class="far fa-file"></i>&nbsp;&nbsp;{{ $file }}</a>
                                <div class="d-inline-block float-right">
                                    <a class="fas fa-link px-2" href="" id="copy_url_{{ $count }}" data-toggle="tooltip" data-placement="top" title="click to copy"></a>
                                    <a class="fas fa-download px-2" href="{{ url("/files/download?path=".$path.'/'.$file) }}"></a>
                                    <a class="fas fa-trash px-2" href="#" onclick="
                                        event.preventDefault();
                                        if(confirm('Are you sure to delete?')){document.getElementById('delete-form-{{ $count }}').submit();}"
                                        ></a>
                                    <form id="delete-form-{{ $count }}" action="/files/delete" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="path" value="{{ $path.'/'.$file }}">
                                        <input type="hidden" name="redirectpath" value="{{ $listed_path }}">
                                    </form>
                                    <input type="text" style="position: fixed; top: -500px; left: -500px" id="url_{{ $count }}" value="{{ url("/files/view?path=".$path.'/'.$file) }}">
                                    <script>
                                        document.getElementById("copy_url_{{ $count }}").addEventListener('click', (e) => {
                                            e.preventDefault();
                                            var copyText = document.getElementById("url_{{ $count }}");
                                            copyText.select();
                                            copyText.setSelectionRange(0, 99999);
                                            document.execCommand("copy");
                                        });
                                    </script>
                                </div>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection
