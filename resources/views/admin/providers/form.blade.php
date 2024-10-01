<div class="col-md-12">
    <x-admin-alert></x-admin-alert>
</div>

<div class="col-12 col-md-4 col-lg-3">
        <div class="inp-holder">
        <label class="special-input">
            <span>اسم الهيئة الطبية</span>
            <input type="text" name="name" value="{{ old('name',isset($provider) ? $provider->name : '') }}" class="form-control">
        </label>
    </div>
</div>

<div class="col-12 col-md-4 col-lg-3">
    <div class="inp-holder">
    <label class="special-input">
        <span>   عنوان الهيئة الطبية</span>
        <input type="text" name="address" value="{{ old('address',isset($provider) ? $provider?->address : '') }}" class="form-control">
    </label>
</div>
</div>

<div class="col-12 col-md-4 col-lg-3">
    <div class="inp-holder">
    <label class="special-input">
        <span>    نسبة الخصم</span>
        <input type="number" name="discount" value="{{ old('discount',isset($provider) ? $provider?->discount : '') }}" class="form-control">
    </label>
</div>
</div>

<div class="col-12 col-md-4 col-lg-3">
    <div class="inp-holder">
        <label for="category_id">التخصص الطبي</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">اختر التخصص الطبي</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ isset($provider) && $provider->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-12 col-md-4 col-lg-3">
    <div class="inp-holder">
    <label class="special-input">
        <span>    رقم الموبايل</span>
        <input type="text" name="phone" value="{{ old('phone',isset($provider) ? $provider?->phone : '') }}" class="form-control">
    </label>
</div>
</div>

<div class="col-12 m-0">
    <hr class="m-0 border-0">
</div>

<div class="col-12 col-md-12 col-lg-12 col-xl-12">
    <div class="btn-holder mt-2">
        <button type="submit" class="main-btn">حفظ</button>
    </div>
</div>
@push('js')
<script src="{{asset('ckeditor-articles/build/ckeditor.js')}}"></script>

@endpush
