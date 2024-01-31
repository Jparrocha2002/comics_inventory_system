<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;

 
class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::orderBy('created_at', 'DESC')->get();
  
        return view('admin.index', compact('admin'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'avatars' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'name' => 'required',
        //     'email' => 'required',
        //     'role' => 'required',
        //     'status' => 'required',
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        // dd($request->all());
        
        // if ($request->hasFile('avatar')) {
        //     $avatar = $request->file('avatar');
        //     $avatarPath = $avatar->store('public/avatars'); // Store the avatar in the public/avatars directory
        // }

        // $user = new User([
        //     'avatar' => isset($avatarPath) ? $avatarPath : null,
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        //     'role' => $validatedData['role'],
        //     'status' => $validatedData['status'],
        //      // Set avatar path if uploaded, otherwise null
        //     // Add other attributes here
        // ]);

        // $user->save();
        // $request->validate([
        //     'avatars' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'name' => 'required',
        //     'email' => 'required',
        //     'role' => 'required',
        //     'status' => 'required',
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        // if($request->has('avatars')){

        //     $file = $request->file('avatars');
        //     $extension = $file->getClientOriginalExtension();

        //     $filename = time().'.'.$extension;

        //     $path = 'public/avatars';
        //     $file->move($path, $filename);
        // }
        
        User::create($request->all());
 
        return redirect()->route('admin')->with('success', 'User added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = User::findOrFail($id);
  
        return view('admin.show', compact('admin'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::findOrFail($id);
  
        return view('admin.edit', compact('admin'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request
    // $request->validate([
    //     'avatars' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the max file size and allowed file types as needed
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|email',
    //     'status' => 'required|string|in:Active,Inactive',
    //     'password' => ['required', 'string', 'min:8', 'confirmed'],
    // ]);

    $admin = User::findOrFail($id);
    
    // Handle avatar upload
    if ($request->hasFile('avatars')) {
        $avatar = $request->file('avatars');

        // Generate a unique filename
        $avatarName = time().'.'.$avatar->getClientOriginalExtension();

        // Store the uploaded avatar in the public/avatars directory
        $path = $avatar->storeAs('public/avatars', $avatarName);

        // Update the admin's avatar path
        $admin->avatars = $path;
    }

    // Update other fields of the admin model based on the validated request data
    $admin->update($request->only('name', 'email', 'role', 'status', 'password'));

    return redirect()->route('admin')->with('success', 'User updated successfully');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);
  
        $admin->delete();
  
        return redirect()->route('admin')->with('success', 'Users deleted successfully');
    }
}