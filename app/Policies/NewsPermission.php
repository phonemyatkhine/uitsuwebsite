<?php

namespace App\Policies;

use App\User;
use App\News;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPermission
{
    use HandlesAuthorization;

    public function hide(User $user, News $news) {
        $current_user_role = Role::where('id', $user->role)->first();
        $news_owner_role = Role::where('id', User::where('id', $news->owner)->first()->role)->first();

        if( $current_user_role->standalone == true ) {
            if( $current_user_role->level <= $news_owner_role->level ) {
                return true;
            }
        } else {
            $committee_as_posted = $news->committee;
            $club_as_posted = $news->club;
            if( $current_user_role->level <= $news_owner_role->level ) {
                if( $user->committee == $committee_as_posted || $user->club == $club_as_posted) {
                    return true;
                }
            }
        }
        return false;
    }

    public function unhide(User $user, News $news) {
        $current_user_role = Role::where('id', $user->role)->first();
        $hidden_role = Role::where('id', User::where('id', $news->hidden_by)->first()->role)->first();

        if( $current_user_role->standalone == true ) {
            if( $current_user_role->level <= $hidden_role->level ) {
                return true;
            }
        } else {
            $committee_as_posted = $news->committee;
            $club_as_posted = $news->club;
            if( $current_user_role->level <= $hidden_role->level ) {
                if( $user->committee == $committee_as_posted || $user->club == $club_as_posted) {
                    return true;
                }
            }
        }
        return false;
    }

}
