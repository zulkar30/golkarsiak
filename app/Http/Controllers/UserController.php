<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUser;
use App\Http\Requests\User\UpdateUser;
use App\Models\Caleg;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Paket;
use App\Models\Role;
use App\Models\Tps;
use App\Models\User;
use Illuminate\Http\Request;
use Gate;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $loggedUser = Auth::user();
        if ($loggedUser->id != 1) {
            $user = User::where('id', '!=', 1)->orderBy('created_at', 'desc')->get();
        } else {
            $user = User::orderBy('created_at', 'desc')->get();
        }

        $roles = Role::all()->pluck('name', 'id');
        $kecamatan = Kecamatan::orderBy('id', 'asc')->get();
        $desa = Desa::orderBy('id', 'asc')->get();
        $tps = Tps::orderBy('id', 'asc')->get();
        $caleg = Caleg::orderBy('id', 'asc')->get();
        $paket = Paket::orderBy('id', 'asc')->get();

        return view('pages.user.index', compact('user', 'roles', 'kecamatan', 'desa', 'tps', 'caleg', 'paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // hash password
        $data['password'] = Hash::make($data['email']);

        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-user';
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs($destinationPath, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // store to database
        $user = User::create($data);

        // sync role by users select
        $user->role()->sync($request->input('role', []));

        alert()->success('Berhasil', 'Berhasil Menambahkan User Baru');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('role');

        return view('pages.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = Role::all()->pluck('name', 'id');
        $user->load('role');
        $caleg = Caleg::orderBy('id', 'asc')->get();
        $paket = Paket::orderBy('id', 'asc')->get();
        $tps = Tps::orderBy('id', 'asc')->get();

        return view('pages.user.edit', compact('user', 'role', 'caleg', 'paket', 'tps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        // get all request from frontsite
        $data = $request->all();

        $data['password'] = Hash::make($data['email']);

        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-user';
            $file = $request->file('foto');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fullFileName = $fileName."-".time().'.'.$file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs($destinationPath, $fullFileName);

            $data['foto'] = $fullFileName;
        }

        // update to database
        $user->update($data);

        // update roles
        $user->role()->sync($request->input('role', []));

        alert()->success('Berhasil', 'Berhasil Memperbarui Data User');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // first checking old file to delete from storage
        $get_item = $user['foto'];

        $data = 'storage/' . $get_item;
        if (File::exists($data)) {
            File::delete($data);
        } else {
            File::delete('storage/app/public/' . $get_item);
        }

        $user->delete();

        alert()->success('Berhasil', 'Berhasil Menghapus Data User');
        return back();
    }

    public function showUser()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function editFoto($user)
    {
        $user = auth()->user();
        return view('profile.edit_foto', compact('user'));
    }

    public function updateFoto(Request $request, User $user)
    {
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $destinationPath = 'public/assets/file-user';
            $file = $request->file('foto');
            $file_name = $file->getClientOriginalName();
            $path = $request->file('foto')->storeAs($destinationPath,$file_name);

            $data['foto'] = $file_name;
        }

        // update to database
        $user->update($data);
        alert()->success('Berhasil', 'Berhasil Memperbarui Foto User');
        return redirect()->route('dashboard');
    }

    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function changePasswordUpdate(Request $request)
    {
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->with('error', 'Password Lama Tidak Sama Dengan Yang Anda Gunakan Saat Ini');
        }
        if($request->new_password != $request->repeat_password){
            return back()->with('error', 'Password baru Dan Repeat Password Tidak Sama');
        }
        Auth::user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('status', 'Password Berhasil Diperbarui');
    }
}
