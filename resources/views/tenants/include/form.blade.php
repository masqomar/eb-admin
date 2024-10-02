<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="subdomain">{{ __('Subdomain') }}</label>
            <input type="text" name="subdomain" id="subdomain" class="form-control @error('subdomain') is-invalid @enderror" value="{{ isset($tenant) ? $tenant->subdomain : old('subdomain') }}" placeholder="{{ __('Subdomain') }}" required />
            @error('subdomain')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="account-bank">{{ __('Account Bank') }}</label>
            <input type="text" name="account_bank" id="account-bank" class="form-control @error('account_bank') is-invalid @enderror" value="{{ isset($tenant) ? $tenant->account_bank : old('account_bank') }}" placeholder="{{ __('Account Bank') }}" required />
            @error('account_bank')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="account-number">{{ __('Account Number') }}</label>
            <input type="text" name="account_number" id="account-number" class="form-control @error('account_number') is-invalid @enderror" value="{{ isset($tenant) ? $tenant->account_number : old('account_number') }}" placeholder="{{ __('Account Number') }}" required />
            @error('account_number')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="account-name">{{ __('Account Name') }}</label>
            <input type="text" name="account_name" id="account-name" class="form-control @error('account_name') is-invalid @enderror" value="{{ isset($tenant) ? $tenant->account_name : old('account_name') }}" placeholder="{{ __('Account Name') }}" required />
            @error('account_name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('Address') }}" required>{{ isset($tenant) ? $tenant->address : old('address') }}</textarea>
            @error('address')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="snk">{{ __('Snk') }}</label>
            <input type="number" name="snk" id="snk" class="form-control @error('snk') is-invalid @enderror" value="{{ isset($tenant) ? $tenant->snk : old('snk') }}" placeholder="{{ __('Snk') }}" required />
            @error('snk')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="subdomain-link">{{ __('Subdomain Link') }}</label>
            <input type="text" name="subdomain_link" id="subdomain-link" class="form-control @error('subdomain_link') is-invalid @enderror" value="{{ isset($tenant) ? $tenant->subdomain_link : old('subdomain_link') }}" placeholder="{{ __('Subdomain Link') }}" required />
            @error('subdomain_link')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="user-id">{{ __('User Id') }}</label>
            <input type="text" name="user_id" id="user-id" class="form-control @error('user_id') is-invalid @enderror" value="{{ isset($tenant) ? $tenant->user_id : old('user_id') }}" placeholder="{{ __('User Id') }}" required />
            @error('user_id')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone-number">{{ __('Phone Number') }}</label>
            <input type="text" name="phone_number" id="phone-number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ isset($tenant) ? $tenant->phone_number : old('phone_number') }}" placeholder="{{ __('Phone Number') }}" required />
            @error('phone_number')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>