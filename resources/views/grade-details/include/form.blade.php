<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="category-id">{{ __('Category') }}</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select category') }} --</option>
                
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($gradeDetail) && $gradeDetail->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
            </select>
            @error('category_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exam-id">{{ __('Exam') }}</label>
            <select class="form-select @error('exam_id') is-invalid @enderror" name="exam_id" id="exam-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select exam') }} --</option>
                
                        @foreach ($exams as $exam)
                            <option value="{{ $exam->id }}" {{ isset($gradeDetail) && $gradeDetail->exam_id == $exam->id ? 'selected' : (old('exam_id') == $exam->id ? 'selected' : '') }}>
                                {{ $exam->title }}
                            </option>
                        @endforeach
            </select>
            @error('exam_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="user-id">{{ __('User') }}</label>
            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ isset($gradeDetail) && $gradeDetail->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
            </select>
            @error('user_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="value-category-id">{{ __('Value Category') }}</label>
            <select class="form-select @error('value_category_id') is-invalid @enderror" name="value_category_id" id="value-category-id" class="form-control">
                <option value="" selected disabled>-- {{ __('Select value category') }} --</option>
                
                        @foreach ($valueCategories as $valueCategory)
                            <option value="{{ $valueCategory->id }}" {{ isset($gradeDetail) && $gradeDetail->value_category_id == $valueCategory->id ? 'selected' : (old('value_category_id') == $valueCategory->id ? 'selected' : '') }}>
                                {{ $valueCategory->name }}
                            </option>
                        @endforeach
            </select>
            @error('value_category_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="grade-id">{{ __('Grade') }}</label>
            <select class="form-select @error('grade_id') is-invalid @enderror" name="grade_id" id="grade-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select grade') }} --</option>
                
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}" {{ isset($gradeDetail) && $gradeDetail->grade_id == $grade->id ? 'selected' : (old('grade_id') == $grade->id ? 'selected' : '') }}>
                                {{ $grade->category_id }}
                            </option>
                        @endforeach
            </select>
            @error('grade_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total-correct">{{ __('Total Correct') }}</label>
            <input type="number" name="total_correct" id="total-correct" class="form-control @error('total_correct') is-invalid @enderror" value="{{ isset($gradeDetail) ? $gradeDetail->total_correct : old('total_correct') }}" placeholder="{{ __('Total Correct') }}" required />
            @error('total_correct')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total-wrong">{{ __('Total Wrong') }}</label>
            <input type="number" name="total_wrong" id="total-wrong" class="form-control @error('total_wrong') is-invalid @enderror" value="{{ isset($gradeDetail) ? $gradeDetail->total_wrong : old('total_wrong') }}" placeholder="{{ __('Total Wrong') }}" required />
            @error('total_wrong')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="grade">{{ __('Grade') }}</label>
            <input type="number" name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror" value="{{ isset($gradeDetail) ? $gradeDetail->grade : old('grade') }}" placeholder="{{ __('Grade') }}" required />
            @error('grade')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>