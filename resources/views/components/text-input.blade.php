<div class="flex flex-col w-full">
    @php
    // Tạo một ID ngẫu nhiên cho input
    $randomFieldId = \Illuminate\Support\Str::uuid();

    // Lấy thông tin về lỗi, nếu không có thì sử dụng $errors
    $messageBag = isset($errorBags) ? $errors->{$errorBags} : $errors;

    // Kiểm tra nếu $messageBag không phải là MessageBag thì đặt lại là null
    if (!($messageBag instanceof \Illuminate\Support\MessageBag)) {
    $messageBag = null;
    }
    @endphp

    @if(isset($label))
    <label class="font-normal mb-2 text-on-surface-600" for="input_{{ ($name ?? '_') . $randomFieldId }}">
        {{ $label }}
    </label>
    @endif

    <input id="input_{{ ($name ?? '_') . $randomFieldId }}" {{ $attributes->merge([
            'class' => 'border text-on-surface-600 border-on-surface-300 px-4 py-4 bg-surface' .
                       ($messageBag && $messageBag->has($name ?? '') ? ' border-red-500' : ''),
        ]) }} type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}" @if(isset($model))
        wire:model="{{ $model }}" @endif @if(isset($name)) name="{{ $name }}" autocomplete="{{ $name }}" @endif
        @if(!empty($readonly)) readonly @endif @if(isset($value)) value="{{ $value }}" @endif autofocus />

    @if($messageBag && $messageBag->has($name ?? ''))
    <span class="text-sm block sm:inline text-red-500 mt-2">
        {{ $messageBag->first($name ?? '') }}
    </span>
    @endif
</div>