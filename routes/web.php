<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectController;

Route::get("/dashboard",[projectController::class,"dashboard"])->name("dashboard");

Route::get("/employee_register",[projectController::class,"employee_register"])->name("employee_register_form");
Route::post("/employee_register",[projectController::class,"employee_store"])->name("employee_register_store");
Route::get("/employee_login",[projectController::class,"employee_login"])->name("employee_login_form");
Route::post("/employee_login",[projectController::class,"employee_login_check"])->name("employee_login_check");

Route::get("/candidate_register",[projectController::class,"candidate_register"])->name("candidate_register_form");
Route::post("/candidate_register",[projectController::class,"candidate_store"])->name("candidate_register_store");
Route::get("/candidate_login",[projectController::class,"candidate_login"])->name("candidate_login_form");
Route::post("/candidate_login",[projectController::class,"candidate_login_check"])->name("candidate_login_check");



Route::get("/create_post",[projectController::class,"create_post"])->name("create_post");
Route::post("/create_post",[projectController::class,"store_post"])->name(name: "store_post");


Route::get("/dashboard/pending_posts",[projectController::class,"pending_posts"])->name("dashboard.pending_posts");
Route::put("/pending_posts/{id}/delete",[projectController::class,"delete_post"])->name("delete_post");
Route::put("/pending_posts/{id}/accept",[projectController::class,"accept_post"])->name("accept_post");


Route::get("/posts_view",[projectController::class,"posts_view"])->name("posts_view");
Route::get("/",[projectController::class,"home"])->name("home");




Route::get("/candidate_profile",[projectController::class,"candidate_profile"])->name("candidate_profile");


Route::get("/candidate_profile/education_edit",[projectController::class,"education_edit_view"])->name("education_edit_view");
Route::post("/candidate_profile/education_edit",[projectController::class,"education_edit_function"])->name("education_edit_function");
Route::get("/candidate_profile/address_edit",[projectController::class,"address_edit_view"])->name("address_edit_view");
Route::post("/candidate_profile/address_edit",[projectController::class,"address_edit_function"])->name("address_edit_function");
Route::get("/candidate_profile/candidate_name_edit",[projectController::class,"candidate_name_edit_view"])->name("candidate_name_edit_view");
Route::post("/candidate_profile/candidate_name_edit",[projectController::class,"candidate_name_edit_function"])->name("candidate_name_edit_function");
Route::get("/candidate_profile/candidate_skills_edit",[projectController::class,"candidate_skill_edit_view"])->name("candidate_skill_edit_view");
Route::post("/candidate_profile/candidate_skills_edit",[projectController::class,"candidate_skill_edit_function"])->name("candidate_skill_edit_function");
Route::get("/candidate_profile/candidate_work_edit",[projectController::class,"candidate_work_experience_edit_view"])->name("candidate_work_experience_edit_view");
Route::post("/candidate_profile/candidate_work_edit",[projectController::class,"candidate_work_experience_edit_function"])->name("candidate_work_experience_edit_function");
Route::get("/candidate_profile/candidate_activities_edit",[projectController::class,"candidate_activities_edit_view"])->name("candidate_activities_edit_view");
Route::post("/candidate_profile/candidateactivities_edit",[projectController::class,"candidate_activities_edit_function"])->name("candidate_activities_edit_function");
Route::get("/candidate_profile/candidate_achievements_edit",[projectController::class,"candidate_achievements_edit_view"])->name("candidate_achievements_edit_view");
Route::post("/candidate_profile/candidate_achievements_edit",[projectController::class,"candidate_achievements_edit_function"])->name("candidate_achievements_edit_function");
Route::get("/candidate_profile/candidate_image_edit",[projectController::class,"candidate_image_view"])->name("candidate_image_view");
Route::post("/candidate_profile/candidate_image_edit",[projectController::class,"candidate_image_function"])->name("candidate_image_function");
Route::post("/candidate_profile/candidate_cv_edit",[projectController::class,"candidate_cv_function"])->name("candidate_cv_function");



Route::get("dashboard/candidates_view",[projectController::class,"candidates_view"])->name("candidates_view");
Route::get("dashboard/employees_view",[projectController::class,"employees_view"])->name("employees_view");


Route::get("admin_login",[projectController::class,"admin_login_view"])->name("admin_login_view");
Route::post("admin_login",[projectController::class,"admin_login_check"])->name("admin_login_check");



Route::get("apply_view/{post_id}/{employee_id}",[projectController::class,"apply_view"])->name("apply_view");
Route::post("apply_view/{post_id}/{employee_id}",[projectController::class,"apply_function"])->name("apply_function");

Route::get("candidate_applications/{candidate_id}",[projectController::class,"candidate_applications"])->name("candidate_applications");
Route::put("/candidate_applications/{application_id}/delete_application",[projectController::class,"delete_application"])->name("delete_application");

Route::get("employee_posts_applications",[projectController::class,"employee_posts_applications"])->name("employee_posts_applications");
Route::put("/employee_applications_acceptance/{application_id}/delete_application",[projectController::class,"employee_delete_application"])->name("employee_delete_application");
Route::get("employee_posts_view",[projectController::class,"employee_posts_view"])->name("employee_posts_view");
Route::put("/employee_delete_post/{application_id}",[projectController::class,"employee_delete_post"])->name("employee_delete_post");

Route::post("posts_view",[projectController::class,"search"])->name("search");