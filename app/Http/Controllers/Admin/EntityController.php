<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Image;
use App\Traits\JodaResource;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;

class EntityController extends Controller
{
    use JodaResource;
    public $model = 'App\Models\User';
    public $route = "admin.entities";
    public $view = "admin.entities";
    public $rules = [
        'name' => 'required',
        'entity_no' => 'required',
        'release_date' => 'required',
        'expire_date' => 'required',
        'phone' => 'required'
    ];

    public function query($query)
    {
        if (\request()->status) {
            if (\request()->status == "good") {
                // Good: Entities with an expire_date that is in the future
                return $query->latest()
                             ->where('expire_date', '>', now()) // Expire date in the future
                             ->where('type', 'entity')
                             ->paginate(10);
            } elseif (\request()->status == "warning") {
                // Warning: Entities whose expire_date is today
                return $query->latest()
                             ->where('expire_date', '=', now()->toDateString()) // Expire date is today
                             ->where('type', 'entity')
                             ->paginate(10);
            } elseif (\request()->status == "danger") {
                // Danger: Entities with an expire_date that has already passed
                return $query->latest()
                             ->where('expire_date', '<', now()) // Expire date in the past
                             ->where('type', 'entity')
                             ->paginate(10);
            }
        } else {
            // Default case: No specific status, return all entities of type 'entity'
            return $query->latest()
                         ->where('type', 'entity')
                         ->paginate(10);
        }

    }

    public function store(Request $request)
    {
        $data = $this->validateStoreRequest();
        $data['type'] = "entity";
        $data['active'] = 1;
        $data['password'] = '$2y$12$Vs/TH.i74LnJaepIAE7JjeYBT6zOHjZfJqVPXDvC3rH.ghwOdpZOW';
        User::create($data);

        return redirect()->route('admin.entities.index')->with('success', "تم الاضافة بنجاح");
    }

    public function update(Request $request, User $user)
    {
        $data = $this->validateUpdateRequest();
        $user->update($data);
        return redirect()->route('admin.entities.index')->with('success', 'تم التعديل بنجاح');
    }


    protected function beforeDestroy($Article) {}
}
