@if(count($errors))
    @foreach($errors->all() as $sr => $error)
    <div id="alert-box-{{ $sr }}" class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 90px; right: 10px; min-width: 280px; z-index: 999">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        $("#alert-box-{{ $sr }}").fadeTo(3000, 500).slideUp(500, function(){
            $("#alert-box-{{ $sr }}").slideUp(500);
        });
    </script>
    @endforeach
@endif

@if(session('success'))
    <div id="alert-box" class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 90px; right: 10px; min-width: 280px; z-index: 999">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
    $("#alert-box").fadeTo(3000, 500).slideUp(500, function(){
        $("#alert-box").slideUp(500);
    });
    </script>
@endif

@if(session('error'))
    <div id="alert-box" class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 90px; right: 10px; min-width: 280px; z-index: 999">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        $("#alert-box").fadeTo(3000, 500).slideUp(500, function(){
            $("#alert-box").slideUp(500);
        });
    </script>
@endif
