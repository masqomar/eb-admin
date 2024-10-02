<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="type">{{ __('Type') }}</label>
            <input type="number" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ (isset($question) ? $question->type : old('type')) ? old('type') : '1' }}" placeholder="{{ __('Type') }}" />
            @error('type')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="direction">{{ __('Direction') }}</label>
            <textarea name="direction" id="direction" class="form-control @error('direction') is-invalid @enderror" placeholder="{{ __('Direction') }}">{{ isset($question) ? $question->direction : old('direction') }}</textarea>
            @error('direction')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="audio-input">{{ __('Audio Input') }}</label>
            <input type="number" name="audio_input" id="audio-input" class="form-control @error('audio_input') is-invalid @enderror" value="{{ isset($question) ? $question->audio_input : old('audio_input') }}" placeholder="{{ __('Audio Input') }}" />
            @error('audio_input')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="audio">{{ __('Audio') }}</label>
            <input type="text" name="audio" id="audio" class="form-control @error('audio') is-invalid @enderror" value="{{ isset($question) ? $question->audio : old('audio') }}" placeholder="{{ __('Audio') }}" />
            @error('audio')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="audio-played">{{ __('Audio Played') }}</label>
            <input type="number" name="audio_played" id="audio-played" class="form-control @error('audio_played') is-invalid @enderror" value="{{ isset($question) ? $question->audio_played : old('audio_played') }}" placeholder="{{ __('Audio Played') }}" />
            @error('audio_played')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="audio-played-limit">{{ __('Audio Played Limit') }}</label>
            <input type="number" name="audio_played_limit" id="audio-played-limit" class="form-control @error('audio_played_limit') is-invalid @enderror" value="{{ isset($question) ? $question->audio_played_limit : old('audio_played_limit') }}" placeholder="{{ __('Audio Played Limit') }}" />
            @error('audio_played_limit')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="audio-answer-time">{{ __('Audio Answer Time') }}</label>
            <input type="number" name="audio_answer_time" id="audio-answer-time" class="form-control @error('audio_answer_time') is-invalid @enderror" value="{{ isset($question) ? $question->audio_answer_time : old('audio_answer_time') }}" placeholder="{{ __('Audio Answer Time') }}" />
            @error('audio_answer_time')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="audio-played-finish">{{ __('Audio Played Finish') }}</label>
            <input type="number" name="audio_played_finish" id="audio-played-finish" class="form-control @error('audio_played_finish') is-invalid @enderror" value="{{ isset($question) ? $question->audio_played_finish : old('audio_played_finish') }}" placeholder="{{ __('Audio Played Finish') }}" />
            @error('audio_played_finish')
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
                            <option value="{{ $valueCategory->id }}" {{ isset($question) && $question->value_category_id == $valueCategory->id ? 'selected' : (old('value_category_id') == $valueCategory->id ? 'selected' : '') }}>
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
            <label for="question-title-id">{{ __('Question Title') }}</label>
            <select class="form-select @error('question_title_id') is-invalid @enderror" name="question_title_id" id="question-title-id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select question title') }} --</option>
                
                        @foreach ($questionTitles as $questionTitle)
                            <option value="{{ $questionTitle->id }}" {{ isset($question) && $question->question_title_id == $questionTitle->id ? 'selected' : (old('question_title_id') == $questionTitle->id ? 'selected' : '') }}>
                                {{ $questionTitle->name }}
                            </option>
                        @endforeach
            </select>
            @error('question_title_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="answer">{{ __('Answer') }}</label>
            <input type="number" name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror" value="{{ isset($question) ? $question->answer : old('answer') }}" placeholder="{{ __('Answer') }}" />
            @error('answer')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="discussion">{{ __('Discussion') }}</label>
            <textarea name="discussion" id="discussion" class="form-control @error('discussion') is-invalid @enderror" placeholder="{{ __('Discussion') }}">{{ isset($question) ? $question->discussion : old('discussion') }}</textarea>
            @error('discussion')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="section">{{ __('Section') }}</label>
            <input type="number" name="section" id="section" class="form-control @error('section') is-invalid @enderror" value="{{ (isset($question) ? $question->section : old('section')) ? old('section') : '1' }}" placeholder="{{ __('Section') }}" />
            @error('section')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>