@extends('layouts.main')

@section('main')
<div id="admin-section" class="py-5 my-5">
    <div class="container">
        <div class="section-title mt-3">
            <div>
                <h1>Site Users</h1>
            </div>
            <p>registered users are listed here</p>
            <div class="view-more-btn">
                <a href="{{ Route('files.upload') }}" class="custom-btn">upload</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">#</th>
                        <th scope="col" class="align-middle">Name</th>
                        <th scope="col" class="align-middle">Email</th>
                        <th scope="col" class="align-middle">Role</th>
                        <th scope="col" class="align-middle">Committee</th>
                        <th scope="col" class="align-middle">Club</th>
                        <th scope="col" class="align-middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $sr => $user)
                    <tr>
                        <th scope="row" class="align-middle">{{ $sr + 1 }}</th>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">{{ isset($user->role) ? App\Role::where('level',$user->role)->first()->name : "None" }}</td>
                        <td class="align-middle">{{ isset($user->committee) ? App\Committee::where('id', $user->committee)->first()->name : "None" }}</td>
                        <td class="align-middle">{{ isset($user->club) ? App\Club::where('id', $user->club)->first()->name : "None" }}</td>
                        <td class="align-middle">
                            <button class="fas fa-edit px-2 user-edit-button bg-transparent border-0"></button>
                            <a href="#" class="fas fa-trash px-2"></a>
                        </td>
                    </tr>
                    <tr id="edit-user-{{ $user->id }}-form" class="d-none w-100">
                        <th scope="row" class="align-middle">{{ $sr + 1 }}</th>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <td class="form-group align-middle"><input type="text" class="form-control form-control-sm" name="name" id="name-{{$user->id}}" placeholder="Name" value="{{ $user->name }}"></td>
                        <td class="form-group align-middle"><input type="email" class="form-control form-control-sm" name="email" id="email-{{$user->id}}" placeholder="Email Address" value="{{ $user->email }}"></td>
                        <td class="form-group align-middle">
                            <select class="form-control form-control-sm" id="role-{{$user->id}}" name="role">
                                @foreach(App\Role::all() as $role)
                                @if($user->role == $role->level))
                                <option value="{{ $role->level }}" selected>{{ $role->name }}</option>
                                @else
                                <option value="{{ $role->level }}">{{ $role->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                        <td class="form-group align-middle">
                            <select name="committee" id="committee-{{$user->id}}" class="form-control form-control-sm">
                                <option value="">None</option>
                                @foreach(App\Committee::all() as $committee)
                                @if(isset($user->committee) && $user->committee == $committee->id)
                                <option value="{{ $committee->id }}" selected>{{ $committee->name }}</option>
                                @else
                                <option value="{{ $committee->id }}">{{ $committee->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                        <td class="form-group align-middle">
                            <select class="form-control form-control-sm" id="club-{{$user->id}}" name="club">
                                <option value="">None</option>
                                @foreach(App\Club::all() as $club)
                                @if(isset($user->club) && $user->club == $club->id)
                                <option value="{{ $club->id }}" selected>{{ $club->name }}</option>
                                @else
                                <option value="{{ $club->id }}">{{ $club->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </td>
                        <td class="align-middle">
                            <button type="button" class="fas fa-save px-2 bg-white border-0" id="user-save-{{ $user->id }}"></button>
                            <a href="#" class="fas fa-times px-2"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('add-js')
<script>
    function updateUser(id, name, email, role, committee, club) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/user/edit',
            method: 'POST',
            data: {
                id: id,
                name: name,
                email: email,
                role: role,
                committee: committee,
                club: club
            },
            success: (msg) => {
                location.reload();
            },
            error: (err) => {
                console.log(err);
            }
        });
    }
    $('.user-edit-button').click((e) => {
        var editFormTr = e.target.parentElement.parentElement.nextElementSibling;
        $(editFormTr).removeClass('d-none');
        $(editFormTr).addClass('d-table-row');
        var id = $(editFormTr).children("[type='hidden']").val();
        var name = $(editFormTr).children("td").children("#" + "name-" + id ).val();
        var email = $(editFormTr).children("td").children("#" + "email-" + id ).val();
        var role = $(editFormTr).children("td").children("#" + "role-" + id ).val();
        var committee = $(editFormTr).children("td").children("#" + "committee-" + id ).val();
        var club = $(editFormTr).children("td").children("#" + "club-" + id ).val();
        console.log({id, name, email, role, committee, club});
        $("#user-save-" + id).click(() => {
            var name = $(editFormTr).children("td").children("#" + "name-" + id ).val();
            var email = $(editFormTr).children("td").children("#" + "email-" + id ).val();
            var role = $(editFormTr).children("td").children("#" + "role-" + id ).val();
            var committee = $(editFormTr).children("td").children("#" + "committee-" + id ).val();
            var club = $(editFormTr).children("td").children("#" + "club-" + id ).val();
            updateUser(id, name, email, role, committee, club);
        });

    });
</script>
@endsection
