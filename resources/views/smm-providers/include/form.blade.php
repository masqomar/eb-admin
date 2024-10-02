<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($smmProvider) ? $smmProvider->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="api-id">{{ __('Api Id') }}</label>
            <input type="text" name="api_id" id="api-id" class="form-control @error('api_id') is-invalid @enderror" value="{{ isset($smmProvider) ? $smmProvider->api_id : old('api_id') }}" placeholder="{{ __('Api Id') }}" />
            @error('api_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="api-key">{{ __('Api Key') }}</label>
            <input type="text" name="api_key" id="api-key" class="form-control @error('api_key') is-invalid @enderror" value="{{ isset($smmProvider) ? $smmProvider->api_key : old('api_key') }}" placeholder="{{ __('Api Key') }}" />
            @error('api_key')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="note">{{ __('Note') }}</label>
            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" placeholder="{{ __('Note') }}">{{ isset($smmProvider) ? $smmProvider->note : old('note') }}</textarea>
            @error('note')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>