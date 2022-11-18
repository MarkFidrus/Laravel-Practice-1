<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function PHPUnit\Framework\isJson;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profileData = DB::table('users')->where('id', $id)->first();

        if ($profileData) {
            $friends = $this->getFriends($id);

            $friendRequests = $this->getFriendRequests($id);

            $location = '';

            if ($profileData->country && !$profileData->settlement)
            {
                $location = $profileData->country;
            }
            elseif(!$profileData->country && $profileData->settlement)
            {
                $location = $profileData->settlement;
            }
            elseif($profileData->country && $profileData->settlement)
            {
                $location = $profileData->country . ', ' . $profileData->settlement;
            }

            $is_friend = false;

            $is_friend_request_sent = false;

            if (Auth::id() !== $id) {
                $is_friend = $this->isFriend($id);
                $is_friend_request_sent = $this->isFriendRequestSent($id);
            }

            return view('profile.show', ['cssName' => 'profile.css', 'title' => $profileData->name], compact('profileData', 'friends','friendRequests', 'is_friend','is_friend_request_sent', 'location'));
        } else {
            return redirect('/')->with('message_text', 'User is not exist!')->with('message_type', 'error');
        }
    }

    private function decodedFriends(int $id)
    {
        $friendsEncoded = DB::table('users')->select('friends')->where('id', $id)->get();

        $friendsDecoded = json_decode($friendsEncoded, true);

        $friends = array();

        foreach ($friendsDecoded as $item) {
            array_push($friends, json_decode($item['friends']));
        }

        return $friends;
    }

    private function decodedFriendRequests(int $id)
    {
        $friendRequestsEncoded = DB::table('users')->select('friend_request')->where('id', $id)->get();

        $friendsRequestsDecoded = json_decode($friendRequestsEncoded, true);

        $friendRequests = array();

        foreach ($friendsRequestsDecoded as $item) {
            array_push($friendRequests, json_decode($item['friend_request']));
        }

        return $friendRequests;
    }

    private function getFriends(int $id)
    {
        $decodedFriends = $this->decodedFriends($id);

        $friends = array();

        foreach ($decodedFriends as $friend)
        {
            if ($friend !== null)
            {
                foreach ($friend as $id)
                {
                    array_push($friends, DB::table('users')->where('id', $id)->first());
                }
            }
            else
            {
                return [];
            }
        }

        return $friends;
    }

    private function getFriendRequests(int $id)
    {
        $decodedFriendRequests = $this->decodedFriendRequests($id);

        $friendRequests = array();

        foreach ($decodedFriendRequests as $request)
        {
            if ($request !== null)
            {
                foreach ($request as $id)
                {
                    array_push($friendRequests, DB::table('users')->where('id', $id)->first());
                }
            }
            else
            {
                return [];
            }
        }

        return $friendRequests;
    }

    private function isFriend(int $id): bool
    {
        $friends = $this->decodedFriends($id);

        foreach ($friends as $friend)
        {
            if ($friend !== null)
            {
                foreach ($friend as $id)
                {
                    if (Auth::id() === $id)
                    {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    private function isFriendRequestSent(int $id)
    {
        $friendRequests = $this->decodedFriendRequests($id);

        foreach ($friendRequests as $request)
        {
            if ($request !== null)
            {
                foreach ($request as $id)
                {
                    if (Auth::id() === $id)
                    {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function set(Request $request)
    {
        $username = $request->input('username');
        $profilePicture = $request->file('profilePicture');
        $picture = '';
        $newPassword = $request->input('newPassword');
        $newPasswordAgain = $request->input('newPasswordAgain');

        if ($profilePicture)
        {
            $picture = $profilePicture->getClientOriginalName();
            $profilePicture->move(public_path('images/profiles'), $picture);
        }

        $newPassword = encrypt($newPassword);
        $newPasswordAgain = encrypt($newPasswordAgain);

        if ($newPassword !== $newPasswordAgain)
        {
            return redirect()->route('profile.index')->with('message_text', 'Passwords are not matched!')->with('message_type', 'danger');
        }
        else
        {
            DB::table('users')->where('id', Auth::id())->update(
                [
                    'name' => $username,
                    'profile_picture' => $picture,
                    'password' => $newPassword
                ]
            );
        }
        return redirect()->route('profile.index')->with('message_text', 'Successfully edited your profile!')->with('message_type', 'success');
    }

    public function postSelector(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $id = $request->input('userId');
            $user = DB::table('users')->where('id', $id)->first();
            if (array_key_exists('acceptFriendRequest', $_POST))
            {
                return $this->acceptFriendRequest($user);
            }
            elseif(array_key_exists('declineFriendRequest', $_POST))
            {
                return $this->declineFriendRequest($user);
            }
            elseif(array_key_exists('sendFriendRequest', $_POST))
            {
                return $this->sendFriendRequest($user);
            }
            elseif(array_key_exists('removeFriend', $_POST))
            {
                return $this->removeFriend($user);
            }
            elseif(array_key_exists('removeFriendRequest', $_POST))
            {
                return $this->removeFriendRequest($user);
            }
        }
    }

    private function acceptFriendRequest($user)
    {
        $decodedUserFriends = $this->decodedFriends($user->id);
        $decodedMyFriends = $this->decodedFriends(Auth::user()->id);
        $decodedMyFriendsRequests = $this->decodedFriendRequests(Auth::user()->id);

        $refreshedMyFriendsList = array();
        $refreshedMyFriendRequestsList = array();

        foreach ($decodedMyFriends as $myFriends)
        {
            foreach ($myFriends as $myFriend)
            {
                array_push($refreshedMyFriendsList, $myFriend);
            }
        }

        array_push($refreshedMyFriendsList, $user->id);

        foreach ($decodedMyFriendsRequests as $friendRequests)
        {
            if ($friendRequests !== null)
            {
                foreach ($friendRequests as $friendRequest)
                {
                    if ($friendRequest !== $user->id)
                    {
                        array_push($refreshedMyFriendRequestsList, $friendRequest);
                    }
                }
            }
        }

        $this->updateFriends(Auth::user()->id, $refreshedMyFriendsList);
        $this->updateFriendRequests(Auth::user()->id, $refreshedMyFriendRequestsList);

        $refreshedUserFriendsList = array();

        foreach ($decodedUserFriends as $userFriends)
        {
            if ($userFriends !== null)
            {
                foreach ($userFriends as $userFriend)
                {
                    array_push($refreshedUserFriendsList, $userFriend);
                }
            }
        }
        array_push($refreshedUserFriendsList, Auth::user()->id);

        $this->updateFriends($user->id, $refreshedUserFriendsList);

        return redirect('/profile/'.Auth::user()->id.'/#friendRequests')->with('message_text', "Accepted ".$user->name."'s friend request!")->with('message_type', 'success');
    }

    private function declineFriendRequest($user)
    {
        $decodedMyFriendsRequests = $this->decodedFriendRequests(Auth::user()->id);
        $refreshedMyFriendRequestsList = array();

        foreach ($decodedMyFriendsRequests as $friendRequests)
        {
            if ($friendRequests !== null)
            {
                foreach ($friendRequests as $friendRequest)
                {
                    if ($friendRequest !== $user->id)
                    {
                        array_push($refreshedMyFriendRequestsList, $friendRequest);
                    }
                }
            }
        }

        $this->updateFriendRequests(Auth::user()->id, $refreshedMyFriendRequestsList);

        return redirect('/profile/'.Auth::user()->id.'/#friendRequests')->with('message_text', "Declined ".$user->name."'s friend request!")->with('message_type', 'success');
    }

    private function sendFriendRequest($user)
    {
        $decodedUserFriendsRequests = $this->decodedFriendRequests($user->id);

        $refreshedUserFriendRequestsList = array();

        foreach ($decodedUserFriendsRequests as $friendRequests)
        {
            if ($friendRequests !== null)
            {
                foreach ($friendRequests as $friendRequest)
                {
                    if ($friendRequest !== Auth::user()->id)
                    {
                        array_push($refreshedUserFriendRequestsList, $friendRequest);
                    }
                    else
                    {
                        $this->acceptFriendRequest($user);
                        return redirect('/profile/'.$user->id)->with('message_text', 'This user sent you a friend request before you send one! So with this request you accept '.$user->name . "'s friend request!")->with('message_type', 'info');
                    }
                }
            }
        }

        array_push($refreshedUserFriendRequestsList, Auth::user()->id);

        $this->updateFriendRequests($user->id, $refreshedUserFriendRequestsList);

        return redirect('/profile/'.$user->id)->with('message_text', 'Friend request has been sent to '.$user->name)->with('message_type', 'success');
    }

    public function removeFriendRequest($user)
    {
        $decodedUserFriendsRequests = $this->decodedFriendRequests($user->id);

        $refreshedUserFriendRequestsList = array();

        foreach ($decodedUserFriendsRequests as $friendRequests)
        {
            if ($friendRequests !== null)
            {
                foreach ($friendRequests as $friendRequest)
                {
                    if ($friendRequest !== Auth::user()->id)
                    {
                        array_push($refreshedUserFriendsList, $friendRequest);
                    }
                }
            }
        }

        $this->updateFriendRequests($user->id, $refreshedUserFriendRequestsList);

        return redirect('/profile/'.$user->id)->with('message_text', 'Successfully has been removed friend request!')->with('message_type', 'success');
    }

    public function removeFriend($user)
    {
        $decodedUserFriends = $this->decodedFriends($user->id);
        $decodedMyFriends = $this->decodedFriends(Auth::user()->id);

        $refreshedMyFriendsList = array();
        $refreshedUserFriendsList = array();

        foreach ($decodedMyFriends as $myFriends)
        {
            if ($myFriends !== null)
            {
                foreach ($myFriends as $myFriend)
                {
                    if ($myFriend !== $user->id)
                    {
                        array_push($refreshedMyFriendsList, $myFriend);
                    }
                }
            }
        }

        foreach ($decodedUserFriends as $userFriends)
        {
            foreach ($userFriends as $userFriend)
            {
                if ($userFriend !== Auth::user()->id)
                {
                    array_push($refreshedUserFriendsList, $userFriend);
                }
            }
        }

        $this->updateFriends(Auth::user()->id,$refreshedMyFriendsList);
        $this->updateFriends($user->id,$refreshedUserFriendsList);

        return redirect('/profile/'.$user->id)->with('message_text', 'Successfully has been removed friend !')->with('message_type', 'success');
    }

    private function updateFriends(int $id, array $friends)
    {
        $encodeFriends = json_encode($friends);
        DB::table('users')->where('id', $id)->update([
            'friends' => $encodeFriends
        ]);
    }

    private function updateFriendRequests(int $id, array $friendsRequests){
        $encodeFriendRequests = json_encode($friendsRequests);
        DB::table('users')->where('id', $id)->update([
            'friend_request' => $encodeFriendRequests
        ]);
    }
}
