<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['users.create', 'users.edit'], function ($view) {
            return $view->with(
                'roles',
                Role::select('id', 'name')->get()
            );
        });
  

				View::composer(['periods.create', 'periods.edit'], function ($view) {
            return $view->with(
                'categories',
                \App\Models\Category::select('id', 'name')->get()
            );
        });

		View::composer(['program-types.create', 'program-types.edit'], function ($view) {
            return $view->with(
                'categories',
                \App\Models\Category::select('id', 'name')->get()
            );
        });

				View::composer(['programs.create', 'programs.edit'], function ($view) {
            return $view->with(
                'periods',
                \App\Models\Period::select('id', 'period_date')->get()
            );
        });

		View::composer(['programs.create', 'programs.edit'], function ($view) {
            return $view->with(
                'programTypes',
                \App\Models\ProgramType::select('id', 'name')->get()
            );
        });

		View::composer(['commissions.create', 'commissions.edit'], function ($view) {
            return $view->with(
                'tenants',
                \App\Models\Tenant::select('id', 'subdomain')->get()
            );
        });

				View::composer(['coupons.create', 'coupons.edit'], function ($view) {
            return $view->with(
                'programs',
                \App\Models\Program::select('id', 'name')->get()
            );
        });

		View::composer(['value-categories.create', 'value-categories.edit'], function ($view) {
            return $view->with(
                'categories',
                \App\Models\Category::select('id', 'name')->get()
            );
        });

				View::composer(['detail-value-categories.create', 'detail-value-categories.edit'], function ($view) {
            return $view->with(
                'valueCategories',
                \App\Models\ValueCategory::select('id', 'name')->get()
            );
        });

				View::composer(['question-titles.create', 'question-titles.edit'], function ($view) {
            return $view->with(
                'categories',
                \App\Models\Category::select('id', 'name')->get()
            );
        });

				View::composer(['questions.create', 'questions.edit'], function ($view) {
            return $view->with(
                'valueCategories',
                \App\Models\ValueCategory::select('id', 'name')->get()
            );
        });

		View::composer(['questions.create', 'questions.edit'], function ($view) {
            return $view->with(
                'questionTitles',
                \App\Models\QuestionTitle::select('id', 'name')->get()
            );
        });

				View::composer(['exams.create', 'exams.edit'], function ($view) {
            return $view->with(
                'categories',
                \App\Models\Category::select('id', 'name')->get()
            );
        });

		View::composer(['exams.create', 'exams.edit'], function ($view) {
            return $view->with(
                'questionTitles',
                \App\Models\QuestionTitle::select('id', 'name')->get()
            );
        });

		View::composer(['grades.create', 'grades.edit'], function ($view) {
            return $view->with(
                'categories',
                \App\Models\Category::select('id', 'name')->get()
            );
        });

View::composer(['grades.create', 'grades.edit'], function ($view) {
            return $view->with(
                'exams',
                \App\Models\Exam::select('id', 'title')->get()
            );
        });

		View::composer(['grades.create', 'grades.edit'], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer(['grade-details.create', 'grade-details.edit'], function ($view) {
            return $view->with(
                'categories',
                \App\Models\Category::select('id', 'name')->get()
            );
        });

View::composer(['grade-details.create', 'grade-details.edit'], function ($view) {
            return $view->with(
                'exams',
                \App\Models\Exam::select('id', 'title')->get()
            );
        });

		View::composer(['grade-details.create', 'grade-details.edit'], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer(['grade-details.create', 'grade-details.edit'], function ($view) {
            return $view->with(
                'valueCategories',
                \App\Models\ValueCategory::select('id', 'name')->get()
            );
        });

		View::composer(['grade-details.create', 'grade-details.edit'], function ($view) {
            return $view->with(
                'grades',
                \App\Models\Grade::select('id', 'category_id')->get()
            );
        });

		View::composer(['students.create', 'students.edit'], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

		View::composer(['transactions.create', 'transactions.edit'], function ($view) {
            return $view->with(
                'users',
                \App\Models\User::select('id', 'name')->get()
            );
        });

View::composer(['transactions.create', 'transactions.edit'], function ($view) {
            return $view->with(
                'exams',
                \App\Models\Exam::select('id', 'title')->get()
            );
        });

		View::composer(['transactions.create', 'transactions.edit'], function ($view) {
            return $view->with(
                'programs',
                \App\Models\Program::select('id', 'name')->get()
            );
        });

		View::composer(['transaction-details.create', 'transaction-details.edit'], function ($view) {
            return $view->with(
                'transactions',
                \App\Models\Transaction::select('id', 'user_id')->get()
            );
        });

	}
}