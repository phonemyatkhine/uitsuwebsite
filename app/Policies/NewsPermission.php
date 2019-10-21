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
        $current_user_role_level = $user->role;
        $current_user_role_standalone = Role::where('level', $current_user_role_level)->first()->standalone;
        $news_owner_role_level = User::where('id', $news->owner)->first()->role;

        // if user has standalone role type
        if( $current_user_role_standalone == true ) {
            if ( $current_user_role_level <= $news_owner_role_level ) {
                return true;
            }
        } else {
            $committee_as_posted = $news->committee;
            $club_as_posted = $news->club;
            if( $current_user_role_level <= $news_owner_role_level ) {
                if( $user->committee == $committee_as_posted || $user->club == $club_as_posted) {
                    return true;
                }
            }
        }
    }

    /**
     * Determine whether the user can view any news.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    // public function viewAny(User $user)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can view the news.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\News  $news
    //  * @return mixed
    //  */
    // public function view(User $user, News $news)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can create news.
    //  *
    //  * @param  \App\User  $user
    //  * @return mixed
    //  */
    // public function create(User $user)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can update the news.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\News  $news
    //  * @return mixed
    //  */
    // public function update(User $user, News $news)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can delete the news.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\News  $news
    //  * @return mixed
    //  */
    // public function delete(User $user, News $news)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can restore the news.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\News  $news
    //  * @return mixed
    //  */
    // public function restore(User $user, News $news)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the news.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\News  $news
    //  * @return mixed
    //  */
    // public function forceDelete(User $user, News $news)
    // {
    //     //
    // }

}
