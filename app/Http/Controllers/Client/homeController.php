<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Traits\handleImageTrait;
use App\Models\User;
use App\Models\Seat_class;
use Auth;

class homeController extends Controller
{
    use handleImageTrait;

    protected $path;

    protected $userModel;
    protected $roleModel;
    protected $seatClassModel;

    public function __construct(User $user, Role $role, Seat_class $seatClass)
    {
        $this->userModel = $user;
        $this->path = 'images/user/';
        $this->roleModel = $role;
        $this->seatClassModel = $seatClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seatClasses = $this->seatClassModel->get();
        return view('client.home.index')->with('seatClasses', $seatClasses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userModel->with('roles')->findOrFail($id);

        return view('client.home.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->userModel->findOrFail($id);
        $image = $request->file('image');

        $dataUpdate = $request->all();

        $dataUpdate['image'] = $this->updateImage($image, $this->path, $user->image);

        $user->update($dataUpdate);
        return redirect()->back()->with('message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
