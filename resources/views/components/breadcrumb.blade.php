<ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    @foreach ($breadcrumb as $key => $b)
    <li>
        <div class="flex items-center">
            @if ($key != 0)
            <i class="fa-solid fa-angle-right text-gray-500 dark:text-gray-500"></i>
            @endif
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-500">{{ ucfirst($b) }}</span>
        </div>
    </li>
    @endforeach
</ol>