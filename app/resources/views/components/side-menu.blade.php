<nav>
    <ul class="flex flex-col gap-2">
        @foreach (App\Models\SideMenu::where('group', ltrim(request()->route()->getPrefix(), '/'))->get() as $item)
            <li class="hover:bg-primarydark_opacity_25 py-2 px-4 rounded-full">
                <a href="{{ route($item->route) }}" class="w-full flex gap-3 whitespace-nowrap">
                        <span class="icon"><i class="{{ $item->icon }}"></i></span>
                        <span class="title text-sm">{{ $item->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>