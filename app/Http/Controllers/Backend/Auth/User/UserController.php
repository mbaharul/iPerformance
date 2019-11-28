<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Models\Auth\User;
use App\Events\Backend\Auth\User\UserDeleted;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Http\Requests\Backend\Auth\User\UpdateUserRequest;
use App\Http\Controllers\Backend\AdminController;
use App\Repositories\Frontend\Auth\DepartmentRepository;
use App\Repositories\Backend\Auth\EmployeeRepository;

/**
 * Class UserController.
 */
class UserController extends AdminController
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request)
    {
        return view('backend.auth.user.index')
            ->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(
        ManageUserRequest $request, 
        RoleRepository $roleRepository, 
        PermissionRepository $permissionRepository,
        DepartmentRepository $deptRepository,
        EmployeeRepository $empRepository
        )
    {
        return view('backend.auth.user.create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withDepartments($deptRepository->getAllDepartment()->pluck('division', 'division_id'))
            ->withAllEmployee($empRepository->all()->sortBy('employee_name'))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @throws \Throwable
     * @return mixed
     */
    public function store(StoreUserRequest $request, EmployeeRepository $empRepository)
    {
        $user = $this->userRepository->create($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));
        
        $data = $request->only(
            'username',
            'staff_no',
            'position',
            'grade',
            'division_id',
            'reporting_to'
        );
        $data['employee_name'] = $request->first_name.' '.$request->last_name;
        $employee = $empRepository->create($data);
        
        $user->update(['staff_id' => $employee->getKey()]);
        
        $empRepository->storeSuperior($employee->getKey(), $request->reporting_to, $this->currentPeriod->year);
        
        $empRepository->storeWeightage($employee->getKey(), $this->currentPeriod->year, $request->grade);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.created'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function show(ManageUserRequest $request, User $user, DepartmentRepository $deptRepository)
    {
        $employee = $user->employeeInfo()->with('superior')->first();
        if($employee== null) {
            $superior = null;
        } else {
            $superior = $employee->superior()->where('year', $this->currentPeriod->year)->first()->superior()->first();
        }
        
        return view('backend.auth.user.show')
            ->withEmployee($employee)
            ->withSuperior($superior)
            ->withDepartments($deptRepository->getAllDepartment()->pluck('division', 'division_id'))
            ->withUser($user);
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param User                 $user
     *
     * @return mixed
     */
    public function edit(
        ManageUserRequest $request, 
        RoleRepository $roleRepository, 
        PermissionRepository $permissionRepository, 
        User $user,
        DepartmentRepository $deptRepository,
        EmployeeRepository $empRepository)
    {
        $employee = $user->employeeInfo()->with('superior')->first();
        return view('backend.auth.user.edit')
            ->withUser($user)
            ->withEmployee($employee)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withDepartments($deptRepository->getAllDepartment()->pluck('division', 'division_id'))
            ->withAllEmployee($empRepository->all()->sortBy('employee_name'))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function update(UpdateUserRequest $request, User $user, EmployeeRepository $empRepository)
    {
        $this->userRepository->update($user, $request->only(
            'first_name',
            'last_name',
            'email',
            'roles',
            'permissions'
        ));
        
        $data = $request->only(
            'username',
            'staff_no',
            'position',
            'grade',
            'division_id',
            'reporting_to'
        );
        $data['employee_name'] = $request->first_name.' '.$request->last_name;
        $empRepository->updateById($user->staff_id, $data);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.updated'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws \Exception
     * @return mixed
     */
    public function destroy(ManageUserRequest $request, User $user)
    {
        $this->userRepository->deleteById($user->id);

        event(new UserDeleted($user));

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('alerts.backend.users.deleted'));
    }
}
