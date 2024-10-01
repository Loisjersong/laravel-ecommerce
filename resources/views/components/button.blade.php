<button {{$attributes->merge(['type' => "submit", "class" => "flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"])}}>
    {{$slot}}
</button>
