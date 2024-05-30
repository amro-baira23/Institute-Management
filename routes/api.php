<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MainAccountController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubAccountController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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

Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminController::class, 'login']);
    Route::middleware('admin-auth')->group(function () {
        Route::prefix('/')->group(function () {
            Route::get('/', [AdminController::class, 'profile']);
            Route::post('/', [AdminController::class, 'editProfile']);
            Route::post('/edit-password', [AdminController::class, 'editPassword']);
            Route::post('/logout', [AdminController::class, 'logout']);
        });
        Route::prefix('students')->group(function () {
            Route::post('/', [StudentController::class, 'addStudent']);
            Route::post('/{student}', [StudentController::class, 'editStudent']);
            Route::get('/', [StudentController::class, 'getStudents']);
            Route::get('/{student}', [StudentController::class, 'getStudentInformation']);
            Route::delete('/{student}', [StudentController::class, 'deleteStudent']);
        });
        Route::prefix('rooms')->group(function () {
            Route::post('/', [RoomController::class, 'addRoom']);
            Route::post('/{room}', [RoomController::class, 'editRoom']);
            Route::get('/', [RoomController::class, 'getRooms']);
            Route::get('/{room}', [RoomController::class, 'getRoomInformation']);
            Route::delete('/{room}', [RoomController::class, 'deleteRoom']);
        });
        Route::prefix('categories')->group(function () {
            Route::post('/', [CategoryController::class, 'addCategory']);
            Route::post('/{category}', [CategoryController::class, 'editCategory']);
            Route::get('/', [CategoryController::class, 'getCategories']);
            Route::get('/{category}', [CategoryController::class, 'getCategoryInformation']);
            Route::delete('/{category}', [CategoryController::class, 'deleteCategory']);
        });
        Route::prefix('subjects')->group(function () {
            Route::post('/', [SubjectController::class, 'addSubject']);
            Route::post('/{subject}', [SubjectController::class, 'editSubject']);
            Route::get('/', [SubjectController::class, 'getSubjects']);
            Route::get('/{subject}', [SubjectController::class, 'getSubjectInformation']);
            Route::delete('/{subject}', [SubjectController::class, 'deleteSubject']);
        });
        Route::prefix('stocks')->group(function () {
            Route::post('/', [StockController::class, 'addItemToStock']);
            Route::post('/{item}', [StockController::class, 'editStockItem']);
            Route::post('/import/{item}', [StockController::class, 'importItem']);
            Route::post('/export/{item}', [StockController::class, 'exportItem']);
            Route::get('/', [StockController::class, 'getStockItems']);
            Route::get('/{item}', [StockController::class, 'getStockItemInformation']);
            Route::delete('/{item}', [StockController::class, 'deleteStockItem']);
        });
        Route::prefix('main-accounts')->group(function () {
            Route::get('/', [MainAccountController::class, 'getMainAccounts']);
            Route::get('/{mainAccount}', [MainAccountController::class, 'getMainAccountInformation']);
        });
        Route::prefix('sub-accounts')->group(function () {
            Route::post('/', [SubAccountController::class, 'addSubAccount']);
            Route::post('/{subAccount}', [SubAccountController::class, 'editSubAccount']);
            Route::get('/', [SubAccountController::class, 'getSubAccounts']);
            Route::get('/{subAccount}', [SubAccountController::class, 'getSubAccountInformation']);
            Route::delete('/{subAccount}', [SubAccountController::class, 'deleteSubAccount']);
        });
        Route::prefix('teachers')->group(function () {
            Route::post('/', [TeacherController::class, 'addTeacher']);
            Route::post('/{teacher}', [TeacherController::class, 'editTeacher']);
            Route::get('/', [TeacherController::class, 'getTeachers']);
            Route::get('/{teacher}', [TeacherController::class, 'getTeacherInformation']);
            Route::delete('/{teacher}', [TeacherController::class, 'deleteTeacher']);
        });
        Route::prefix('courses')->group(function () {
            Route::post('/', [CourseController::class, 'addCourse']);
            Route::post('/{course}', [CourseController::class, 'editCourse']);
            Route::get('/', [CourseController::class, 'getCourses']);
            Route::get('/{course}', [CourseController::class, 'getCourseInformation']);
            Route::delete('/{course}', [CourseController::class, 'deleteCourse']);
        });
    });
});
