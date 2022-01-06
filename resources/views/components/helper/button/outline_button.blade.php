<x-helper.button.base_button  :attributes="$attributes->merge(['class'=>'border border-gray-300
             bg-white text-sm shadow-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none
            focus:ring-2 p-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500'])">
    {{$slot}}
</x-helper.button.base_button>
