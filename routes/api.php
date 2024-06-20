<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\MainAccountController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubAccountController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::post('/login', [UserController::class, 'login']);
    Route::middleware('user-auth')->group(function () {
        Route::prefix('/')->group(function () {
            Route::get('/', [UserController::class, 'profile']);
            Route::post('/', [UserController::class, 'editProfile']);
            Route::post('/edit-password', [UserController::class, 'editPassword']);
            Route::post('/logout', [UserController::class, 'logout']);
        });
        Route::middleware('manage-student')->prefix('students')->group(function () {
            Route::post('/', [StudentController::class, 'addStudent']);
            Route::post('/{student}', [StudentController::class, 'editStudent']);
            Route::get('/', [StudentController::class, 'getStudents']);
            Route::get('/{student}', [StudentController::class, 'getStudentInformation'])->name("get");
            Route::delete('/{student}', [StudentController::class, 'deleteStudent']);
        });
        Route::middleware('manage-room')->prefix('rooms')->group(function () {
            Route::post('/', [RoomController::class, 'addRoom']);
            Route::post('/{room}', [RoomController::class, 'editRoom']);
            Route::get('/', [RoomController::class, 'getRooms']);
            Route::get('/{room}', [RoomController::class, 'getRoomInformation']);
            Route::delete('/{room}', [RoomController::class, 'deleteRoom']);
        });
        Route::middleware('manage-category')->prefix('categories')->group(function () {
            Route::post('/', [CategoryController::class, 'addCategory']);
            Route::post('/{category}', [CategoryController::class, 'editCategory']);
            Route::get('/', [CategoryController::class, 'getCategories']);
            Route::get('/{category}', [CategoryController::class, 'getCategoryInformation']);
            Route::delete('/{category}', [CategoryController::class, 'deleteCategory']);
        });
        Route::middleware('manage-subject')->prefix('subjects')->group(function () {
            Route::post('/', [SubjectController::class, 'addSubject']);
            Route::post('/{subject}', [SubjectController::class, 'editSubject']);
            Route::get('/', [SubjectController::class, 'getSubjects']);
            Route::get('/{subject}', [SubjectController::class, 'getSubjectInformation']);
            Route::delete('/{subject}', [SubjectController::class, 'deleteSubject']);
        });
        Route::middleware('manage-stock')->prefix('stocks')->group(function () {
            Route::post('/', [StockController::class, 'addItemToStock']);
            Route::post('/{item}', [StockController::class, 'editStockItem']);
            Route::post('/import/{item}', [StockController::class, 'importItem'])->name("import");
            Route::get('/', [StockController::class, 'getStockItems']);
            Route::get('/{item}', [StockController::class, 'getStockItemInformation']);
            Route::delete('/{item}', [StockController::class, 'deleteStockItem']);
        });
        Route::middleware('manage-stock')->prefix('stock_details')->group(function () {
            Route::get('/', [StockController::class, 'getStockDetails']);
            Route::get('/{detail}', [StockController::class, 'getStockDetailInformation']);
        });
        Route::prefix('main-accounts')->group(function () {
            Route::get('/', [MainAccountController::class, 'getMainAccounts']);
            Route::get('/{mainAccount}', [MainAccountController::class, 'getMainAccountInformation']);
        });
        Route::middleware('manage-sub-account')->prefix('sub-accounts')->group(function () {
            Route::post('/', [SubAccountController::class, 'addSubAccount']);
            Route::post('/{subAccount}', [SubAccountController::class, 'editSubAccount']);
            Route::get('/', [SubAccountController::class, 'getSubAccounts']);
            Route::get('/{subAccount}', [SubAccountController::class, 'getSubAccountInformation']);
            Route::delete('/{subAccount}', [SubAccountController::class, 'deleteSubAccount']);
        });
        Route::middleware('manage-teacher')->prefix('teachers')->group(function () {
            Route::post('/', [TeacherController::class, 'addTeacher']);
            Route::post('/{teacher}', [TeacherController::class, 'editTeacher']);
            Route::get('/', [TeacherController::class, 'getTeachers']);
            Route::get('/{teacher}', [TeacherController::class, 'getTeacherInformation']);
            Route::delete('/{teacher}', [TeacherController::class, 'deleteTeacher']);
        });
        Route::middleware('manage-teacher')->prefix('shifts')->group(function () {
            Route::post('/', [ShiftController::class, 'storeShift']);
            Route::post('/{shift}', [ShiftController::class, 'editShift']);
            Route::get('/', [ShiftController::class, 'listShifts']);
            Route::get('/{shift}', [ShiftController::class, 'getShift']);
            Route::delete('/{shift}', [ShiftController::class, 'destroyShift']);
        });
        Route::middleware('manage-teacher')->prefix('job-titles')->group(function () {
            Route::post('/', [JobTitleController::class, 'store']);
            Route::post('/{jobTitle}', [JobTitleController::class, 'update']);
            Route::get('/', [JobTitleController::class, 'index']);
            Route::get('/{jobTitle}', [JobTitleController::class, 'show']);
            Route::delete('/{jobTitle}', [JobTitleController::class, 'destroy']);
        });
        Route::middleware('manage-course')->prefix('courses')->group(function () {
            Route::post('/', [CourseController::class, 'addCourse']);
            Route::post('/{course}', [CourseController::class, 'editCourse']);
            Route::get('/', [CourseController::class, 'getCourses']);
            Route::get('/{course}', [CourseController::class, 'getCourseInformation']);
            Route::delete('/{course}', [CourseController::class, 'deleteCourse']);
        });
        Route::prefix('permissions')->group(function () {
            Route::get('/', [PermissionController::class, 'getPermissions']);
            Route::get('/{permission}', [PermissionController::class, 'getPermissionInformation']);
        });
        Route::middleware('manage-role')->prefix('roles')->group(function () {
            Route::post('/', [RoleController::class, 'addRole']);
            Route::post('/{role}/permissions', [RoleController::class, 'attachPermission']);
            Route::post('/{role}', [RoleController::class, 'editRole']);
            Route::get('/', [RoleController::class, 'getRoles']);
            Route::get('/{role}', [RoleController::class, 'getRoleInformation']);
            Route::delete('/{role}', [RoleController::class, 'deleteRole']);
        });
        Route::middleware('manage-employee')->prefix('employees')->group(function () {
            Route::post('/', [EmployeeController::class, 'addEmployee']);
            Route::post('/{employee}', [EmployeeController::class, 'editEmployee']);
            Route::get('/', [EmployeeController::class, 'getEmployees'])->name("list");
            Route::get('/{employee}', [EmployeeController::class, 'getEmployeeInformation'])->name("get");
            Route::delete('/{employee}', [EmployeeController::class, 'deleteEmployee']);
        });
    });

// Route::prefix('employee')->group(function () {
//     Route::post('/login', [EmployeeController::class, 'login']);
//     Route::middleware('employee-auth')->group(function () {
//         Route::get('/', [EmployeeController::class, 'profile']);
//     });
// });