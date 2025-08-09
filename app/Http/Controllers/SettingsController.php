<?php

namespace App\Http\Controllers;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\user_group;
use App\Models\permissions;
use App\Models\role_permissions;
use App\Models\User;
use App\Models\ticket_sla;
use App\Models\ticket_category;
use App\Models\tickets;
use App\Models\attachment;
use App\Models\user_tickets;
use App\Models\assigned_tickets;
use App\Models\ticket_resolutions; 
use App\Models\AccommodationProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 
class SettingsController extends Controller
{
    // user group
    public function userGroup(){
        $user_group = user_group::get();
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        $userId = auth()->id();
     
        return view('settings.usergroup', compact('user_group','permissions'));
    }
    public function createUserGroups(Request $request)
    {
        try {
            $request->validate([
                'group_name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ]);

            $user_group = new user_group();
            $user_group->group_name = $request->input('group_name');
            $user_group->description = $request->input('description');
            $user_group->save();

            return redirect()->route('settings.Settings')->with('success', 'User Group created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to create user group. ' . $e->getMessage());
        }
    }
    public function DeleteUserGroup($id)
    {
        $userGroup = user_group::findOrFail($id);
        $userGroup->delete();
        return redirect()->route('settings.Settings')->with('success', 'User group deleted successfully.');
    }
    
    public function editUserGroup($id)
    {
        try {
            $user_group = user_group::findOrFail($id);
            $user = auth()->user();
            $permissions = $user->user_group->permissions;
        $userId = auth()->id();
      
            return view('settings.editUsergroup', compact('user_group','permissions'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to edit user group. ' . $e->getMessage());
        }
    }
    public function updateUserGroup(Request $request, $id)
    {
        try {
            $request->validate([
             
            ]);
            $user_group = user_group::findOrFail($id);
            $user_group->group_name = $request->input('group_name');
            $user_group->description=$request->input('description');
            $user_group->save();
            return redirect()->route('settings.Settings')->with('success', 'User group updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to update user group. ' . $e->getMessage());
        }
    }
    // user permissions
    public function userRole(){
        $user_role = permissions::get();
        $user = auth()->user();
        $permissions = $user->user_group->permissions;
        $userId = auth()->id();

        return view('settings.userRole', compact('user_role','permissions'));
    }
    public function createUserRole(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ]);
$names = explode(',', $request->input('name'));
foreach ($names as $name) {
    $trimmedName = trim($name);
    $user_role = new permissions();
    $user_role->name = $trimmedName;
    $user_role->description = $request->input('description');
    $user_role->save();
}

            return redirect()->back()->with('success', 'User role created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to create user Role. ' . $e->getMessage());
        }
    }
    public function DeleteUserRole($id)
    {
        $userRole = permissions::findOrFail($id);
        $userRole->delete();
        return redirect()->route('settings.Settings')->with('success', 'User Role deleted successfully.');
    }
    
    public function editUserRole($id)
    {
        try {
            $user_role = permissions::findOrFail($id);
            $user = auth()->user();
            $permissions = $user->user_group->permissions;
        $userId = auth()->id();
  
            return view('settings.editUserRole', compact('user_role','permissions'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to edit user role. ' . $e->getMessage());
        }
    }
    public function updateUserRole(Request $request, $id)
    {
        try {
            $request->validate([
             
            ]);
            $user_role = permissions::findOrFail($id);
            $user_role->name = $request->input('name');
            $user_role->description=$request->input('description');
            $user_role->save();
            return redirect()->route('settings.Settings')->with('success', 'User role updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to update user role. ' . $e->getMessage());
        }
    }
    // user management
    public function userlist()
    {
        try {
            $users = User::with('user_group','provider')->get();
            $groups =user_group::all();
            $user = auth()->user();
            $permissions = $user->user_group->permissions;
        $userId = auth()->id();
     
            return view('settings.userlist', compact('groups','users','permissions'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to load userlist. ' . $e->getMessage());
        }
    }
    public function user()
    {
        try {
            $users = User::with('user_group')->get();
            $groups =user_group::all();
               $providers = AccommodationProvider::all();
            $user = auth()->user();
            $permissions = $user->user_group->permissions;
        $userId = auth()->id();
     
            return view('settings.user', compact('groups','users','permissions','providers'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to load users. ' . $e->getMessage());
        }
    }
    public function createUser(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'mobile' => 'required|string|max:10',
                'email' => 'required|email|max:255|unique:users,email',
               'provider_id' => 'required|exists:accommodation_providers,id',
                'group_id' => 'required|exists:user_group,id', // Ensure group exists
                'password' => 'required|string|min:8', // password confirmation
            ]);
            $plainPassword = $validatedData['password'];
            // Create the user
            $user = new User;
            $user->fname = $validatedData['fname'];
            $user->lname = $validatedData['lname'];
            $user->mobile = $validatedData['mobile'];
            $user->email = $validatedData['email'];
            $user->provider_id = $validatedData['provider_id'];
            $user->group_id = $validatedData['group_id'];
            $user->password = Hash::make($plainPassword); // Hash the password
            $user->save();

            return redirect()->back()->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to load users. ' . $e->getMessage());
        }
    }
    public function editUser($id)
    {
        try {
            $users = User::findOrFail($id);
            $groups =user_group::all();
              $providers = AccommodationProvider::all();
            $user = auth()->user();
            $permissions = $user->user_group->permissions;
       
            return view('settings.editUser', compact('users','groups','permissions','providers'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to edit user role. ' . $e->getMessage());
        }
    }
    public function updateUser(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'mobile' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:users,email,' . $id,
                'provider_id' => 'required|exists:accommodation_providers,id',
                'group_id' => 'required|integer',
                'password' => 'nullable|string|min:8',
            ]);

            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->mobile = $request->input('mobile');
            $user->email = $request->input('email');
            $user->provider_id = $request->input('provider_id');
            $user->group_id = $request->input('group_id');
                // Check if password is provided
                if ($request->filled('password')) {
                    $plainPassword = $request->input('password'); // Capture plain password
                    $user->password = Hash::make($plainPassword); // Hash the password for storage

                }

                $user->save();
            return redirect()->route('settings.userlist')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to update user group. ' . $e->getMessage());
        }
    }
    public function deactivate($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->status = 'inactive';
            $user->save();
            return redirect()->back()->with('success', 'User deactivated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to deactivate user. ' . $e->getMessage());
        }
    }

    public function activate($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->status = 'active';
            $user->save();
            return redirect()->back()->with('success', 'User activated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to activate user. ' . $e->getMessage());
        }
    }
    // systems settings
    public function systemSettings()
    {
        try {
            $roles = role_permissions::with('user_group', 'permissions')->get();
            $groups =user_group::all();
            $permission =permissions::all();
            $user = auth()->user();
            $permissions = $user->user_group->permissions;
            $userId = auth()->id();
           
            return view('settings.systemSettings', compact('groups','roles','permission','permissions'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to load users. ' . $e->getMessage());
        }
    }
    public function Settings()
    {
        try {
      
            $groups =user_group::all();
            $permission =permissions::all();
            $user = auth()->user();
            $permissions = $user->user_group->permissions;
            $roles = role_permissions::with('user_group','permissions')->get();

            return view('settings.Settings', compact('groups','roles','permission','permissions'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to load users. ' . $e->getMessage());
        }
    }
    public function store(Request $request)
    {
        $permissions = $request->input('permissions', []); // Fetch submitted data
    
        // Loop through the submitted permissions to handle unchecked ones
        foreach ($permissions as $permissionId => $userGroupIds) {
            // 1. Remove any existing permissions where the permission_id exists but not in the user_group_ids
            role_permissions::where('permission_id', $permissionId)
                            ->whereNotIn('user_group_id', $userGroupIds) // Delete unchecked user group ids
                            ->delete();
    
            // 2. Add new permissions for checked user groups
            foreach ($userGroupIds as $userGroupId) {
                // Only add if it doesn't already exist (i.e., avoid duplicates)
                $existingPermission = role_permissions::where('permission_id', $permissionId)
                                                        ->where('user_group_id', $userGroupId)
                                                        ->first();
                if (!$existingPermission) {
                    role_permissions::create([
                        'permission_id' => $permissionId,
                        'user_group_id' => $userGroupId,
                    ]);
                }
            }
       
   
        // Optionally, delete any role_permissions related to permissions that were not sent in the request
        $allPermissionIds = array_keys($permissions); // Get all permission IDs from the form
        role_permissions::whereNotIn('permission_id', $allPermissionIds) // Delete records with permission_id not in the list
                        ->delete();
    }


    return redirect()->back()->with('success', 'Role permissions updated successfully!');
}
    public function createSettings(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_group_id' => 'required|exists:user_group,id',
                'permission_id' => 'required|array', 
             'permission_id.*' => 'exists:permissions,id',
            ]);
        
            $userGroupId = $request->input('user_group_id');
            $permissionIds = $request->input('permission_id');
          
            foreach ($permissionIds as $permissionId) {
                DB::table('role_permissions')->updateOrInsert(
                    [
                        'user_group_id' => $userGroupId,
                        'permission_id' => $permissionId
                    ]
                );
            }
            // Redirect back with a success message
            return back()->with('success', 'Role successfully assigned.');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to load users. ' . $e->getMessage());
        }
    }
    public function DeleteSettings($id)
    {
        $userRole = role_permissions::findOrFail($id);
        $userRole->delete();
        return redirect()->route('settings.systemSettings')->with('success', 'User Role deleted successfully.');
    }
    //sidebar
    public function getSidebarData()
{
    $user = auth()->user();
    $permissions = $user->user_group->permissions; // Get all permissions for the user group
    return view('/settings.systemSettings', compact('permissions'));
}

}
