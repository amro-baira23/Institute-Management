<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ImportExportController;
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
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get("/attempt",[DebtController::class,"index"]);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('user-auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('/', [AuthController::class, 'profile']);
        Route::post('/', [AuthController::class, 'editProfile']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    Route::middleware('manage-user')->prefix('users')->group(function () {
        Route::post('/', [UserController::class, 'store']);
        Route::post('/{user}', [UserController::class, 'edit']);
        Route::get('/', [UserController::class, 'index'])->name("index");
        Route::get('/unattached', [UserController::class, 'indexUnattached'])->name("unattached");
        Route::get('/{user}', [UserController::class, 'get']);
        Route::delete('/{user}', [UserController::class, 'delete']);
        Route::post('/{user}/restore', [UserController::class, 'restore'])->withTrashed();
    });

    Route::middleware('manage-user')->prefix('activities')->group(function () {
        Route::get('/', [ActivityController::class,"index"]);
    });

    Route::middleware('manage-user')->prefix('roles')->group(function () {
        Route::post('/', [RoleController::class, 'addRole']);
        Route::post('/{role}', [RoleController::class, 'editRole']);
        Route::get('/', [RoleController::class, 'getRoles']);
        Route::get('/{role}', [RoleController::class, 'getRoleInformation']);
        Route::delete('/{role}', [RoleController::class, 'deleteRole']);
    });

    Route::middleware("manage-user")->prefix('permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'getPermissions']);
        Route::get('/{permission}', [PermissionController::class, 'getPermissionInformation']);
    });

    Route::middleware('manage-student')->prefix('students')->group(function () {
        Route::post('/', [StudentController::class, 'addStudent']);
        Route::post('/{student}', [StudentController::class, 'editStudent']);
        Route::get('/', [StudentController::class, 'getStudents']);
        Route::get('/names', [StudentController::class, 'getNames']);
        Route::get('/{student}', [StudentController::class, 'getStudentInformation'])->name("get");
        Route::delete('/{student}', [StudentController::class, 'deleteStudent']);
        Route::get('/{student}/courses', [StudentController::class, 'getCourses']);
        Route::post('/{student}/restore', [StudentController::class, 'restoreStudent'])->withTrashed();

    });

    Route::middleware('manage-stock')->prefix('stocks')->group(function () {
        Route::post('/', [StockController::class, 'addItemToStock']);
        Route::post('/{item}', [StockController::class, 'editStockItem']);
        Route::post('/import/{item}', [StockController::class, 'importItem'])->name("import");
        Route::get('/', [StockController::class, 'getStockItems']);
        Route::get('/{item}', [StockController::class, 'getStockItemInformation']);
        Route::delete('/{item}', [StockController::class, 'deleteStockItem']);
    });

    Route::middleware("manage-accounting")->prefix('main-accounts')->group(function () {
        Route::get('/', [MainAccountController::class, 'getMainAccounts']);
    });

    Route::middleware("manage-accounting")->prefix('debts')->group(function () {
        Route::get('/students', [DebtController::class, 'indexStudents']);  
        Route::get('/teachers', [DebtController::class, 'indexTeachers']);
        Route::post('/pay_student', [DebtController::class, 'payStudent']);
        Route::post('/pay_teacher', [DebtController::class, 'payTeacher']);
    });

    Route::middleware('manage-accounting')->prefix('sub-accounts')->group(function () {
        Route::post('/', [SubAccountController::class, 'addSubAccount']);
        Route::post('/{subAccount}', [SubAccountController::class, 'editSubAccount']);
        Route::get('/additionals', [SubAccountController::class, 'getAddedSubAccounts']);
        Route::get('/employees', [SubAccountController::class, 'getEmployeeSubAccounts']);
        Route::get('/names', [SubAccountController::class, 'getNames']);
        Route::get('/{subAccount}', [SubAccountController::class, 'getSubAccountInformation']);
        Route::delete('/{subAccount}', [SubAccountController::class, 'deleteSubAccount']);
    });
    Route::middleware('manage-teacher')->prefix('teachers')->group(function () {
        Route::post('/', [TeacherController::class, 'addTeacher']);
        Route::post('/{teacher}', [TeacherController::class, 'editTeacher']);
        Route::get('/', [TeacherController::class, 'getTeachers']);
        Route::get('/names', [TeacherController::class, 'getNames']);
        Route::get('/{teacher}', [TeacherController::class, 'getTeacherInformation']);
        Route::delete('/{teacher}', [TeacherController::class, 'deleteTeacher']);
        Route::post('/{teacher}/restore', [TeacherController::class, 'restoreTeacher'])->withTrashed();
    });

    Route::middleware('manage-course')->prefix('courses')->group(function () {
        Route::post('/', [CourseController::class, 'addCourse']);
        Route::post('/{course}', [CourseController::class, 'editCourse']);
        Route::get('/', [CourseController::class, 'getCourses'])->name("schedule");
        Route::get('/index', [CourseController::class, 'indexCourses'])->name("index");
        Route::get('/{course}', [CourseController::class, 'getCourseInformation']);
        Route::delete('/{course}', [CourseController::class, 'deleteCourse']);
        Route::get('/{course}/students', [CourseController::class, 'getStudents']);
        Route::post('/{course}/students/{student:id}', [CourseController::class, 'reverseStudentEnrollmentType']);
        Route::delete('/{course}/students/{student:id}', [CourseController::class, 'deleteStudent']);
    });

    Route::middleware('manage-course')->prefix('rooms')->group(function () {
        Route::post('/', [RoomController::class, 'addRoom']);
        Route::post('/{room}', [RoomController::class, 'editRoom']);
        Route::get('/', [RoomController::class, 'getRooms']);
        Route::get('/{room}', [RoomController::class, 'getRoomInformation']);
        Route::delete('/{room}', [RoomController::class, 'deleteRoom']);
    });
    Route::middleware('manage-course')->prefix('categories')->group(function () {
        Route::post('/', [CategoryController::class, 'addCategory']);
        Route::post('/{category}', [CategoryController::class, 'editCategory']);
        Route::get('/', [CategoryController::class, 'getCategories']);
        Route::get('/{category}', [CategoryController::class, 'getCategoryInformation']);
        Route::delete('/{category}', [CategoryController::class, 'deleteCategory']);
    });
    Route::middleware('manage-course')->prefix('subjects')->group(function () {
        Route::post('/', [SubjectController::class, 'addSubject']);
        Route::post('/{subject}', [SubjectController::class, 'editSubject']);
        Route::get('/', [SubjectController::class, 'getSubjects']);
        Route::get('/{subject}', [SubjectController::class, 'getSubjectInformation']);
        Route::delete('/{subject}', [SubjectController::class, 'deleteSubject']);
    });

    Route::middleware('manage-course')->prefix('enrollments')->group(function () {
        Route::post('/', [EnrollmentController::class, 'store']);
        Route::post('/{enrollment}', [EnrollmentController::class, 'update']);
        Route::get('/', [EnrollmentController::class, 'index']);
        Route::delete('/{enrollment}', [EnrollmentController::class, 'destroy']);
    });

    Route::middleware('manage-course')->prefix('shopping-items')->group(function () {
        Route::post('/', [ShoppingItemController::class, 'addShoppingItem']);
        Route::post('/{shoppingItem}', [ShoppingItemController::class, 'editShoppingItem']);
        Route::get('/', [ShoppingItemController::class, 'getShoppingItems']);
        Route::get('/{shoppingItem}', [ShoppingItemController::class, 'getShoppingItemInformation']);
        Route::delete('/{shoppingItem}', [ShoppingItemController::class, 'deleteShoppingItem']);
    });

    Route::middleware('manage-employee')->prefix('employees')->group(function () {
        Route::post('/', [EmployeeController::class, 'addEmployee']);
        Route::post('/{employee}', [EmployeeController::class, 'editEmployee']);
        Route::get('/', [EmployeeController::class, 'getEmployees'])->name("list");
        Route::get('/unattached', [EmployeeController::class, 'getUnattached']);
        Route::get('/{employee}', [EmployeeController::class, 'getEmployeeInformation']);
        Route::delete('/{employee}', [EmployeeController::class, 'deleteEmployee']);
        Route::post('/{employee}/restore', [EmployeeController::class, 'restoreEmployee'])->withTrashed();
    });
    Route::middleware('manage-employee')->prefix('shifts')->group(function () {
        Route::post('/', [ShiftController::class, 'storeShift']);
        Route::post('/{shift}', [ShiftController::class, 'editShift']);
        Route::get('/', [ShiftController::class, 'listShifts']);
        Route::get('/{shift}', [ShiftController::class, 'getShift']);
        Route::delete('/{shift}', [ShiftController::class, 'destroyShift']);
    });
    Route::middleware('manage-employee')->prefix('job-titles')->group(function () {
        Route::post('/', [JobTitleController::class, 'store']);
        Route::post('/{jobTitle}', [JobTitleController::class, 'update']);
        Route::get('/', [JobTitleController::class, 'index']);
        Route::get('/names', [JobTitleController::class, 'getNames']);
        Route::get('/{jobTitle}', [JobTitleController::class, 'show']);
        Route::delete('/{jobTitle}', [JobTitleController::class, 'destroy']);
    });
    Route::middleware('manage-certificate')->prefix('certificates')->group(function () {
        Route::get('/', [CertificateController::class, 'getCertificates']);
        Route::get('/{certificate}', [CertificateController::class, 'getCertificateInformation']);
        Route::get('/create/{certificate}', [CertificateController::class, 'createStudentCertificate']);
        Route::delete('/{certificate}', [CertificateController::class, 'deleteCertificate']);
    });

    Route::middleware('manage-transaction')->prefix('transactions')->group(function () {
        Route::post('/', [TransactionController::class, 'addTransaction']);
        Route::post('/{transaction}', [TransactionController::class, 'editTransaction']);
        Route::delete('/{transaction}', [TransactionController::class, 'deleteTransaction']);
        Route::get('/', [TransactionController::class, 'getTransactions']);
        Route::get('/{transaction}', [TransactionController::class, 'getTransactionInformation']);
    });

    Route::middleware('manage-import-export')->group(function(){
        Route::prefix('imports')->group(function(){
            Route::post('students',[ImportExportController::class, 'importStudents']);
            Route::post('teachers',[ImportExportController::class, 'importTeachers']);
            Route::post('employees',[ImportExportController::class, 'importEmployees']);
        });
        Route::prefix('exports')->group(function(){
            Route::post('teachers',[ImportExportController::class, 'exportTeachers']);
            Route::post('students',[ImportExportController::class, 'exportStudents']);
            Route::post('employees',[ImportExportController::class, 'exportEmployees']);
        });
    });
});

