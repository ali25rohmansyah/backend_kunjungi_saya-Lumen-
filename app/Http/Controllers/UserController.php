<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $user = User::select('nik', 'nama', 'no_hp', 'sales_respon', 'foto');
        return response()->json($user);
    }

    public function detail($id){
        $user = User::find($id);
        return response()->json($user);
    }

    public function create(Request $request){
        $this->validate($request, [
            'nik' => 'required|string',
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'status_no_hp' => 'required|in:1, 2',
            'status_kepegawaian' => 'required|in:aktif,pensiun',
            'gaji' => 'required|integer',
            'pembayaran_gaji' => 'required|in:bni,mandiri,bri',
            'sales_respon' => 'required|string',
        ]);

        $data = $request->all();
        $user = User::create($data);

        return response()->json($user);
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'User not found'], 404);
        }

        $data = $request->all();

        $user->fill($data);
        $user->save();

        return response()->json($user);
    }

    public function destroy($id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'User not found'], 404);
        }
        
        $user->delete();
        
        return response()->json(['message' => 'User deleted']);
    }

    public function redirect(){
        return redirect("/user");
    }
}
