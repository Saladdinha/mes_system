<div class="input-group flex flex-col relative w-{{ $w }}">
    <label class="font-bold font-title text-xs absolute left-2 top-1">
        {{ $label }}
        @if ($required)
            <span class="required text-red-700 text-base leading-4 align-middle">*</span>
        @endif
    </label>
    @if ($inputType == 'select')
        <div class="select overflow-hidden {{ (isset($multiple)) ? $multiple : '' }}" name="{{ $name }}" id="{{ $id }}"
            required="{{ $required }}">
            <div class='head bg-neutralwhite border-2 px-2 pb-1 pt-3 border-primarydark rounded-t-lg '>
                @php
                    $key = 0;
                @endphp
                @foreach ($items as $name => $value)
                        @php
                            if ($key == 0) {
                                echo $name;
                                break;
                            }
                        @endphp
                @endforeach
            </div>
            <div
                class="itens flex flex-col border-2 px-2 pb-1 border-t-0 border-primarydark rounded-b-lg max-h-24 overflow-y-scroll translate-y-full">
                @php
                    $key = 0;
                @endphp
                @foreach ($items as $name => $value)
                        @php
                            if ($key == 0) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                        @endphp
                        <span
                            class="item cursor-pointer border-b border-primarydark px-2 py-1 w-full hover:bg-primarydark_opacity_25 {{ $selected }}"
                            data-value="{{ $value }}">
                            {{ $name }}
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