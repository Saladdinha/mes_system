<div class="input-group rounded-lg flex flex-col relative w-{{ $w }}">
    <label class="font-bold font-title text-xs absolute left-2 top-1 z-20">
        {{ $label }}
        @if ($required)
            <span class="required text-red-700 text-base leading-4 align-middle">*</span>
        @endif
    </label>
    @if ($inputType == 'select')
        <div class="select {{ (isset($multiple)) ? $multiple : '' }}">
            <div class='relative rounded-t-lg z-10 head bg-neutralwhite border-2 px-2 pb-1 pt-3 border-primarydark'>
                @php
                    $key = 0;
                @endphp
                @foreach ($items as $item_name => $value)
                        @php
                            if ($key == 0) {
                                echo $item_name;
                                $item_value = $value;
                                break;
                            }
                        @endphp
                @endforeach
                <i class="fa-solid fa-caret-up absolute right-4 up top-4"></i>
                <i class="fa-solid fa-caret-down absolute right-4 down top-4"></i>
            </div>
            <input type="text" hidden name="{{ $name }}" id="{{ $id }}" value="{{ $item_value }}">
            <div
                class="items bg-neutralwhite h-0 absolute w-full flex flex-col border-2 px-2 pb-1 border-t-0 border-primarydark rounded-b-lg max-h-24 overflow-y-scroll -translate-y-full duration-300 ease-linear transition-all">
                @php
                    $key = 0;
                @endphp
                @foreach ($items as $item_name => $value)
                        @php
                            if ($key == 0) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                        @endphp
                        <span
                            class="item my-0.5 cursor-pointer border-b border-primarydark px-2 py-1 w-full hover:bg-neutralblack hover:text-neutralwhite {{ $selected }}"
                            data-value="{{ $value }}">
                            {{ $item_name }}
                        </span>
                        @php
                            $key++;
                        @endphp
                @endforeach
            </div>
        </div>
    @elseif ($inputType == 'textarea')
        <textarea
            class="min-h-8 bg-neutralwhite border-2 px-2 pb-1 pt-3 border-primarydark rounded-lg hover:border-primarylight focus:border-primarylight"
            name="{{ $name }}" id="{{ $id }}" required="{{ $required }}"></textarea>
    @else
        <input
            class='min-h-8 bg-neutralwhite border-2 px-2 pb-1 pt-3 border-primarydark rounded-lg hover:border-primarylight focus:border-primarylight'
            type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" required="{{ $required }}" readonly="{{ $readonly }}" />
    @endif
</div>