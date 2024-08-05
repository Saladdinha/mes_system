<div class="relative">
    <button class="sidemenu_btn absolute -right-8 bg-neutralblack rounded-full w-10 h-10 hover:bg-primarydark z-10">
        <i class="withdrawn fa-solid fa-plus"></i>
        <i class="expanded fa-solid fa-minus"></i>
    </button>
</div>
<nav>
    <ul class="flex flex-col gap-2">
        @foreach (App\Models\SideMenu::where('group', ltrim(request()->route()->getPrefix(), '/'))->get() as $item)
                @php
                    if ($item->route == request()->route()->getName()) {
                        $active = 'activate';
                    } else {
                        $active = "";
                    }
                @endphp
                <li class="hover:bg-primarylight_opacity_25 py-2 px-4 rounded-full {{ $active }} overflow-hidden">
                    <a href="{{ route($item->route) }}" class="w-full flex gap-3">
                        <span class="icon"><i class="{{ $item->icon }}"></i></span>
                        <span class="title text-sm hidden whitespace-nowrap opacity-0">{{ $item->name }}</span>
                    </a>
                </li>
        @endforeach
    </ul>
</nav>