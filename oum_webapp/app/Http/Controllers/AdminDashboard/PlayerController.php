<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Str;


class PlayerController extends Controller
{
    public function storePlayer(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'player_nr' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'playing_for' => 'required',
        ]);

        $licenseNr = Str::random(10);

        $existingPlayer = Player::where('license_nr', $licenseNr)->first();

        if ($existingPlayer) {
            return redirect()->back()->with('error', 'Etwas ist mit der Lizenz schiefgelaufen,versuche es erneut.');
        }


        $player = new Player;
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->player_nr = $request->player_nr;
        $player->license_nr = $licenseNr;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->first_name . '_' . $request->last_name . '_' . $licenseNr . '.' . $image->extension();
            $image->move(public_path('player_img'), $imageName);
            $player->image = $imageName;
        }

        $player->playing_for = $request->playing_for;

        $player->save();

        return redirect()->route('edit')->with('success', 'Spieler erfolgreich erstellt.');
    }
}
